<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class AdminNewsletterController extends Controller
{
    public function index(Request $request,$type)
    {
        if($type == 'user' || $type == 'merchant'){
            $emails = DB::table('users')->where('role', $type)->get();
        }else{
            $emails = DB::table('users')->get();
        }

       
        return view('admin.newsletter.newsletter')->with('newsletter',$emails);
    }

    public function newsLetter(Request $request) {
        
   
        $tos = $request->email;
        $subject = $request->subject;
        $msg = $request->desc;
        $headers = "From: Simpefy" . "\r\n";
      
        foreach($tos as $to)
        {
            
			Mail::send('emails.send-otp',compact('msg'), function($message) use($to){
				$message->to($to)->subject
				('Message From Simpefy');
				$message->from('support@talkforce.co.uk','Molicule');
			});
        }   

        $request->session()->flash('success','Mail Sent Succesfully');
        return redirect()->back();
        
    }
}
