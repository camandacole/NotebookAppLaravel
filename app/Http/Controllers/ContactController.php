<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class ContactController extends Controller
{
    //
    public function getContact()
    {
        return view('emails.contact-form');
    }

    public function postContact(Request $request)
    {   
        $this->validate($request, array(

       'name'=>'required',   
       'email'=>'required|email',   
       'subject'=>'required|min:3',   
       'message'=>'required|min:10'
    ));

      $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodymessage' => $request->message
      );

      Mail::send('emails.contact-message',$data, function($message) use ($data) {

                   $message->from($data['email'],$data['name']);
                   $message->to('colebuddy101@gmail.com');
                   $message->subject($data['subject']);
      });
        Session::flash('success', 'thank you! your message has been sent successfully');

        return redirect()->route('contact.index');
               
      
    }
}
