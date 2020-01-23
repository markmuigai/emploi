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
    }

    public function index()
    {
        if(isset(Auth::user()->id) && Auth::user()->canHandleCvEdits())
            return view('cvediting.index');
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
            'industry'    =>  ['integer'],
            'message' => ['max:500']
        ]);

        $storage_path = '/public/resumes';
        $resume_url = basename(Storage::put($storage_path, $request->resume));

        $r = CvEditRequest::create([
            'email' => $request->email,
            'industry_id' => $request->industry, 
            'name' => $request->name,
            'message' => $request->message ? $request->message : 'No custom message',
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

            
            Seeker::first()->notify(new EditingRequest($r->name.' requested for CV Editing'));
        }
        else
            $message = "An error occurred while processing your request. Kindly try again after a while or contact us if the error persists";
        

        
        return view('cvediting.created')
                ->with('name',$request->name)
                ->with('message',$message);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
