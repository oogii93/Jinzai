<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function show(){
        return view('mail.contact');
    }

    public function send(Request $request){
        $validatedData=$request->validate([
            'name'=>'required',
            'birth_of_date'=>'required',
            'school'=>'nullable',
            'school_year'=>'nullable',
            'address'=>'required',
            'mail_address'=>'required',
            'phone_number'=>'required',
            'message'=>'required'

        ]);

        Mail::to('marino.sato@taisei-hds.co.jp')->send(new \App\Mail\ContactForm2($validatedData));


        return redirect()->route('home')->with('success', '送信されました。ありがとうございました。');
    }
}
