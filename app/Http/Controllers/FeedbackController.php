<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, array(
            'cid' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email',
            'ctl_name' => 'required',
            'position' => 'required',
            'rating' => 'required',
        ));
        
        $data = array(
            'cid' => $request->cid,
            'name' => $request->name,
            'email' => $request->email,
            'ctl_name' => $request->ctl_name,
            'position' => $request->position,
            'rating' => $request->rating,
            'comments' => $request->comments,
        );
        
         Mail::send('emails.feedback', $data, function($message) use ($data){
            $message->from('wguisbond@gmail.com');
            $message->to('ta@zhuartcc.org');
            $message->cc('atm@zhuartcc.org', 'datm@zhuartcc.org');
            $message->subject('Feedback Submission Notification');
        });
        
        Session::flash('success', 'Your feedback was submitted! Thank you for providing your opinion.');
        
        return view('feedback');
    } 
}
