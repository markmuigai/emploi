<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jobs\EmailJob;
use App\Notifications\AdvertRequest;
use Notification;

use App\Advert;
use App\Employer;

class AdvertController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'store'
        ]]);
    }

    public function index($id = false){
        if($id)
        {
            $ad = Advert::findOrFail($id);
            return view('adverts.show')
                ->with('advert',$ad);
        }
        $ads = Advert::orderBy('status','DESC')->orderBy('id','DESC')->paginate(10);
        return view('adverts.index')
                ->with('adverts',$ads);
    }

    public function store(Request $request)
    {
        $a = Advert::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description
        ]);

        $caption = "Advertisement request on Emploi has been submitted.";
        $contents = "We have received your Advertisement Request on Emploi and will get in touch with you shortly. Emploi's philosophy is to create a single sourcing point for players, with enough tools to help them find each other.<br>
        <a href='".url('/employers/create')."'>Create an account as an employer</a> and get access to recruitment with our Role Suitability Index and much more.<br><br>

        If you have any questions, feel free to call us on +(254) 702 068 282 or write to us info@emploi.co.


        Thank you for choosing Emploi";
        EmailJob::dispatch($a->name, $a->email, 'Emploi Advertisement Request Created', $caption, $contents);

        $title = ' - '.$a->title ? $a->title : '';
        $phone_number = ' - '.$a->phone_number ? $a->phone_number : '';

        Notification::send(Employer::first(),new AdvertRequest('NEW ADVERT REQUEST: '.$a->name.' has requested for an advertisement'.$title.$phone_number));

        // $caption = "Advertisement request received on Emploi";
        // $contents = "We have received an Advertisement Request from <b>".$a->name."</b>.
        // Log into <a href='/admin/received-requests/".$a->id."'>Admin panel</a> to view more details.";
        // EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Emploi Advertisement Request Created', $caption, $contents);

        return view('adverts.created')
                ->with('advert',$a);
        return $request->all();
    }

    public function saveNotes(Request $request, $id){
        $ad = Advert::findOrFail($id);
        $ad->notes = $request->notes;
        $ad->status = $request->status;
        $ad->updated_at = now();
        $ad->save();
        return redirect('/admin/received-requests/'.$ad->id.'?saved=true');
    }

}
