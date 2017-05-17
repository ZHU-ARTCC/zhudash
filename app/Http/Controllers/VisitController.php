<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, array(
            'cid' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email',
            'facility' => 'required',
            'rating' => 'required',
        ));
        
        $data = array(
            'cid' => $request->cid,
            'name' => $request->name,
            'email' => $request->email,
            'facility' => $request->facility,
            'rating' => $request->rating,
        );
        
         Mail::send('emails.visitorconfirm', $data, function($message) use ($data){
            $message->from('wguisbond@gmail.com');
            $message->to($data['email']);
            $message->cc('atm@zhuartcc.org', 'datm@zhuartcc.org');
            $message->subject('Visitor Application Notification');
        });
        
        Session::flash('success', 'Your application was submitted! Please check your email for more information');
        
        return view('visit');
    } 
}
