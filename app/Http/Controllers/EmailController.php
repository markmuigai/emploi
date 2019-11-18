<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EmailController extends Controller
{
    public function unsubscribe(Request $request,$email){
    	User::unsubscribeEmails($email);
    	echo "You have unsubscribed from Emploi Emails. Click <a href='".url('/subscribe/'.$email)."'>here</a> to re-subscribe";
    	die("<br><br><a href='".url('/')."'>Home</a>");
    	
    }

    public function subscribe(Request $request,$email){
    	User::subscribeEmails($email);
    	echo "You have subscribed to Emploi Email Alerts.";
    	die("<br><br><a href='".url('/')."'>Home</a>");
    }
}
