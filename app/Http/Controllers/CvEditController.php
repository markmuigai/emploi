<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\CvEditor;
use App\CvEditRequest;
use App\Seeker;
use App\User;

use App\Jobs\EmailJob;
use App\Notifications\EditingRequest;

class CvEditController extends Controller
{
    public function __construct() {
        $this->middleware('editor', ['except' => [
            'show','store','create','index'
        ]]);

        $this->middleware('auth', ['except' => [
            'store','create','index'
        ]]);
    }

    public function index()
    {
        
        
        if(isset(Auth::user()->id) && Auth::user()->canHandleCvEdits())
        {
            $rs = CvEditRequest::where('cv_editor_id',Auth::user()->cvEditor->id)
                    ->orderBy('submitted_on')
                    ->paginate(10);

            return view('cvediting.index')
                ->with('edits',$rs);
        }

        return redirect('/job-seekers/cv-editing');
                //->with('editRequests',Auth::user()->cvEditor->cvEditRequests->paginate(10));
    }

    public function create()
    {
        return redirect('/job-seekers/cv-editing');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email'  =>  ['required', 'string', 'email','max:50'],
            'resume' => ['required','mimes:pdf,docx,doc','max:51200'],
            'phone_number' => ['required', 'string', 'max:20'],
            'industry'    =>  ['integer'],
            'message' => ['max:500']
        ]);

        $free_review = isset($request->free_review) ? true : false;

        $storage_path = '/public/resume-edits';
        $resume_url = basename(Storage::put($storage_path, $request->resume));

        $review_message = $request->message ? $request->message : 'No custom message';

        if($free_review)
        {
            $review_message = '[FREE CV REVIEW]: '.$review_message;
        }

        $r = CvEditRequest::create([
            'email' => $request->email,
            'industry_id' => $request->industry, 
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'message' => $review_message,
            'slug' => strtolower(User::generateRandomString(30)),
            'original_url' => $resume_url
        ]);
        if(isset($r->id))
        {

            $message = "Request has been received for professional CV editing. One of our representatives will get in touch shortly. Thank you for choosing Emploi";

            $caption = "CV Editing request has been received on Emploi";
            $contents = $message."

            <br><br>
            Your final CV would be sent to your e-mail address. <br>
            <a href='".url('/cv-editing/'.$r->slug)."'>View Updates</a> <br><br>

            Thank you for choosing Emploi.";

            EmailJob::dispatch($r->name, $r->email, 'Professional CV Editing Requested', $caption, $contents);

            if (app()->environment() === 'production') {
                $sm = $free_review ?  $r->name.' requested for CV Editing' : $r->name.' requested for Free CV Review';
                Seeker::first()->notify(new EditingRequest($sm));
            }
        }
        else
            $message = "An error occurred while processing your request. Kindly try again after a while or contact us if the error persists";
        

        
        return view('cvediting.created')
                ->with('name',$request->name)
                ->with('message',$message);
    }

    public function show($slug)
    {
        $r = CvEditRequest::where('slug',$slug)->firstOrFail();
        return view('cvediting.show')
                    ->with('edit',$r);
        // $show = true;
        // if(isset(Auth::user()->id))
        // {
        //     $user = Auth::user();
        //     if($user->email != $r->email)
        //         $show = false;
        // }
        // if($show)
        // {
        //     return view('cvediting.show')
        //             ->with('edit',$r);
        // }
        // $user = Auth::user();
        // $r = CvEditRequest::where('slug',$slug)->firstOrFail();
        // if($user->id == $r->cvEditor->user->id || $r->email == $user->email)
        // {
        //     return view('cvediting.show')
        //             ->with('edit',$r);
        // }
        return redirect('/job-seekers/cv-editing');
    }

    public function edit($slug)
    {
        $user = Auth::user();
        $r = CvEditRequest::where('slug',$slug)->firstOrFail();
        if($user->id == $r->cvEditor->user->id)
        {
            return view('cvediting.edit')
                    ->with('edit',$r);
        }
        return redirect('/cv-editing/'.$slug);

    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'final_cv' => ['required','mimes:pdf,docx,doc','max:51200'],
            'message' => ['required']
        ]);
        $user = Auth::user();
        $r = CvEditRequest::where('slug',$slug)->firstOrFail();
        if($user->id == $r->cvEditor->user->id)
        {
            $storage_path = '/public/resume-edits';
            $resume_url = basename(Storage::put($storage_path, $request->final_cv));

            $r->submitted_on = now();
            $r->submitted_url = $resume_url;
            $r->status = 'ready';
            $r->save();

            $contents = $r->cvEditor->user->name." has an update for you regarding your CV editing. <br>
            <b>Message</b> <br>
            ".$request->message." <br><br>
            You can download it at any time <a href='".url('/storage/resume-edits/'.$resume_url)."'>here</a>
            <br>
            For additional enquiries, kindly <a href='".url('/contact')."'>contact us</a>. We wish you all the best. <br><br>
            Thank you for choosing Emploi.
            ";

            $caption = "Your CV has been edited";

            EmailJob::dispatch($r->name, $r->email, 'We have edited your CV', $caption, $contents);

            User::first()->notify(new EditingRequest($r->cvEditor->user->name.' finished editing cv for '.$r->name));
            //return $request->all();
        }
        return redirect('/cv-editing/'.$slug);
    }

    public function destroy($id)
    {
        //
    }
}
