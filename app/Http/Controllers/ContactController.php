<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact-me');
    }

    public function send(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];
        $dataComfirmation = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'comfirmation' => true
        ];

        Mail::to('seppelescur.work@gmail.com')->send(new ContactFormMail($data));
        Mail::to($request->input('email'))->send(new ContactFormMail($dataComfirmation));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
