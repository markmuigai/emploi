<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\InviteLink;
use App\User;

class InviteLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $inviteLinks = InviteLink::where('user_id',$user->id)
                    ->orderBy('created_at','DESC')
                    ->paginate(10);
        return view('invites.index')
                ->with('invites',$inviteLinks);
    }

    public function create()
    {
        $user = Auth::user();
        return view('invites.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $invite = InviteLink::create([
            'user_id' => $user->id,
            'message' => $request->message ? $request->message : null,
            'slug' => strtolower(User::generateRandomString(19))
        ]);
        return view('invites.created')
                ->with('invite',$invite);
    }

    public function show($slug)
    {
        $user = Auth::user();
        $invite  = InviteLink::where('user_id',$user->id)->where('slug',$slug)->firstOrFail();
        return view('invites.show')
                ->with('invite',$invite);
    }

    public function edit($slug)
    {
        $user = Auth::user();
        $invite  = InviteLink::where('user_id',$user->id)->where('slug',$slug)->firstOrFail();
        return view('invites.edit')
                ->with('invite',$invite);
    }

    public function update(Request $request, $slug)
    {
        $user = Auth::user();
        $invite  = InviteLink::where('user_id',$user->id)->where('slug',$slug)->firstOrFail();
        $invite->message = $request->message;
        $invite->save();
        return view('invites.updated')
                ->with('invite',$invite);
    }

    public function destroy($slug)
    {
        $user = Auth::user();
        $invite  = InviteLink::where('user_id',$user->id)->where('slug',$slug)->firstOrFail();
        $slug = $invite->slug;
        $invite->delete();
        return view('invites.deleted')
                ->with('slug',$slug);
    }
}
