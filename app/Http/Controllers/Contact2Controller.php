<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class Contact2Controller extends Controller
{


    public function show(){
        return view('mail.contact2');
    }


    public function send(Request $request){
        $validatedData=$request->validate([
            'company_name'=>'required',
            'manager_name'=>'required',
            'phone_number'=>'required',
            'mail_address'=>'required',
            'message'=>'required'
        ]);


        Mail::to('marino.sato@taisei-hds.co.jp')->send(new \App\Mail\ContactForm2($validatedData));


        return redirect()->route('home')->with('success', '送信されました。ありがとうございました。');
    }

}
