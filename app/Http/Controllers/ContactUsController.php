<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Mail\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'message' => 'required'
        ]);
        $contact= new ContactUs([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        $contact->save();
        $data =[
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        Mail::to("masudc614@gmail.com")->send(new ContactUsMail($data));
        notify()->success('Thanks for Contact Us!');
        return redirect()->back()->withInput();
    }
}
