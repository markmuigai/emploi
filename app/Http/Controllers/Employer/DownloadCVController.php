<?php

namespace App\Http\Controllers\Employer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DownloadCVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadCV($username)
    {
        $user = User::where('username',$username)->firstOrFail();

        return Response::download($user->seeker->resumeUrl, $username);

        // Get cv url
        // return Storage::download($user->seeker->resumeUrl, $username);
    }
}
