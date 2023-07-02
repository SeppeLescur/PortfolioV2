<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    function store (Request $request) : RedirectResponse{
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->content = $request->input('content');
        $message->save();
        // Mail::to('seppelescur.work@gmail.com','Seppe Lescur')->send(new Contact($message));
        return redirect('/');
    }
}
