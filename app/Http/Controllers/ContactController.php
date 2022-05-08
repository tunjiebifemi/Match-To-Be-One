<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Alert;

class ContactController extends Controller
{
    
    public function storeContactForm(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|digits:10|numeric',
        //     'subject' => 'required',
        //     'message' => 'required',
        // ]);

        // $input = $request->all();

        // Contact::create($input);


        //  Send mail to admin
        \Mail::send('contactMail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),            
            'subject' => $request->get('subject'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request){
           // $message->from(env('MAIL_FROM_ADDRESS'));
        //   $adminEmails = ['waleborokini@gmail.com', 'wborokini@gmail.com', 'olawaleborokini@gmail.com', 'topeborokini99@gmail.com'];
            $message->to('waleborokini@gmail.com')->subject($request->get('subject'));
        });

        $alerted = toast('Your message was sent successfully', 'success');

        return redirect()->back()->with(compact('alerted'));
    }

}
