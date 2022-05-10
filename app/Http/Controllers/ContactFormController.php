<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function form(){

        return view('contact.form');
    }

    public function send(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('info@diarioprogramador.com')->send(new ContactForm($data));

        return back()->with('data', $data)->with('message', ['success', 'Message sent succesfully']);
    }
}
