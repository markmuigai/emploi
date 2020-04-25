<?php

namespace App\Http\Controllers;

use App\Meetup;

use App\MeetupSubscription;
use Auth;
use Illuminate\Http\Request;

class MeetupSubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('/events');
    }

    public function create()
    {
        return redirect('/events');
    }

    public function store(Request $request)
    {
        $meetup = Meetup::where('slug',$request->slug)->firstOrFail();
        
        Auth::user()->toggleMeetup($meetup);
        return redirect('/events/'.$meetup->slug);
    }

    public function show(MeetupSubscription $meetupSubscription)
    {
        return redirect('/events');
    }

    public function edit(MeetupSubscription $meetupSubscription)
    {
        return redirect('/events');
    }

    public function update(Request $request, MeetupSubscription $meetupSubscription)
    {
        // $meetup = Meetup::where('slug',$request->slug)->firstOrFail();
        // $this->user->toggleMeetup($meetup);
        // return redirect('/events/'.$meetup->slug);
    }

    public function destroy(MeetupSubscription $meetupSubscription)
    {
        //
    }
}
