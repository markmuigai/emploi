<?php

namespace App\Http\Controllers;

use App\Meetup;
use App\User;


use Auth;
use Illuminate\Http\Request;
use Image;

class MeetupController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'index','show'
        ]]);
    }

    public function index()
    {
        return view('meetups.index')
                ->with('meetups',Meetup::where('ended_at','!=',NULL)->where('cancelled_at','!=',NULL)->paginate(20));
    }

    public function create()
    {
        return view('meetups.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'          =>  ['required','min:5','max:200','string'],
            'email'         =>  ['required','email' ,'string'],
            'address'         =>  ['required','max:500' ,'string'],
            'caption'         =>  ['max:500' ,'string'],
            'description'         =>  ['string'],
            'country'         =>  ['integer'],
            'industry'         =>  ['integer'],
            'image'          => ['required','mimes:png,jpg,jpeg','max:51200'],
            'start_time'         => ['required'],
            'end_time'         => ['required'],
        ]);

        $image_url = null;


        $image = $request->file('image');
        $image_url = time() . '.' . $image->getClientOriginalExtension();
        $storage_path = storage_path().'/app/public/images/events/'.$image_url;
        $watermark = Image::make(public_path('/images/logo.png'));   
        // $featured_image_url = basename(Storage::put($storage_path, $request->featured_image));

        Image::make($image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);

        $m = Meetup::create([
            'slug'        => User::generateRandomString(23),
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'address'         =>  $request->address,
            'caption'         =>  $request->caption,
            'description'         =>  $request->description,
            'country'         =>  $request->country,
            'industry'         =>  $request->industry,
            'user_id'           => $user->id,
            'image'          => $image_url,
            'start_time'         => $request->start_time,
            'end_time'         => $request->end_time
        ]);

        return redirect('/events/'.$m->slug);
    }

    public function show($slug)
    {
        $meetup = Meetup::where('slug',$slug)->firstOrFail();
        return view('meetups.show')
                ->with('meetup',$meetup);
    }

    public function edit(Meetup $meetup)
    {
        return view('meetups.edit')
                ->with('meetup',$meetup);
    }

    public function update(Request $request, Meetup $meetup)
    {
        //
    }

    public function destroy(Meetup $meetup)
    {
        //
    }

    public function adminMeetups($endpoint = false, Request $request){
        
        $title = 'Events';
        switch ($endpoint) {
            case 'cancelled':
                $meetups = Meetup::where('cancelled_at','!=',NULL)->orderBy('id','DESC')->paginate(20);
                $title = 'Cancelled Events';
                break;

            case 'upcoming':
                $meetups = Meetup::where('started_at',NULL)
                            ->where('cancelled_at',NULL)
                            //->where('start_time',is_future)
                            ->orderBy('id','DESC')->paginate(20);
                $title = 'Upcoming Events';
                break;

            case 'in-progress':
                $meetups = Meetup::where('started_at','!=',NULL)
                            ->where('cancelled_at',NULL)
                            ->where('ended_at',NULL)
                            ->orderBy('id','DESC')->paginate(20);
                $title = 'Events In Progress';
                break;

            case 'completed':
                $meetups = Meetup::where('ended_at','!=',NULL)
                            ->orderBy('id','DESC')->paginate(20);
                $title = 'Past Events';
                break;
            
            default:
                
                //return 'haha';
                # code...
                $meetup = Meetup::where('slug',$endpoint)->first();
                if(isset($meetup->id))
                {
                    return redirect('/events/'.$endpoint);
                }
                
                $meetups = Meetup::orderBy('id','DESC')->paginate(20);

                break;
        }
        return view('admins.meetups.index')
                ->with('title',$title)
                ->with('meetups',$meetups);
    }
}
