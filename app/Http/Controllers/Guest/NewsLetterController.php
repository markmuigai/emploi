<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\NewsLetter;
use App\Jobs\EmailJob;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email'  =>  ['required', 'string', 'email','max:50']
        ]);

        $user = NewsLetter::where('email', '=', $request->email)->first();
            if ($user === null) {
                $n = NewsLetter::create([
                    'name' => $request->name,
                    'email' => $request->email, 
                    'status' => 'active',
                ]);

                if(isset($n->id))
                {
                    
                    $caption = "Newsletter Subscription";
                    $contents = "You have successfully subscribed to our newsletter. This will enable you to receive updates on vacancies and career information. <br><br><br>
            

                    If this was by a mistake you can unsubscribe <a href='".url('/v2/news-letter/'.$n->id.'/edit' )."'>here</a>. Thank you for choosing Emploi.
                            ";
                    EmailJob::dispatch($request->name, $request->email, 'Newsletter Subscription', $caption, $contents);

                    return redirect()->back(); 
                }
            }
            else

            {
                $u = NewsLetter::find($user->id);
                $u->update(['name' => $request->name, 'status' =>'active']);
                $u->save();
               
                if(isset($u->id)){

                    $caption = "Newsletter Subscription";
                    $contents = "You have successfully resubscribed to our newsletter. This will enable you to receive updates on vacancies and career information. <br><br><br>
            

                    If this was by a mistake you can unsubscribe <a href='".url('/v2/news-letter/'.$u->id.'/edit' )."'>here</a>. Thank you for choosing Emploi.
                            ";
                    EmailJob::dispatch($request->name, $request->email, 'Newsletter Subscription', $caption, $contents);

                    return redirect()->back();
                    } 
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriber = NewsLetter::where('id',$id)->firstOrFail();
        return view('v2.guests.newsLetter.edit',[
            'subscriber' => $subscriber
        ]);                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriber = NewsLetter::where('id',$id)->firstOrFail();

        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->status = 'inactive';
        $subscriber->save();

        return redirect()->back()->with('message', 'You have successfully unsubscribed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
