<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Message;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index() {
        $data = [
            'subject' => 'test',
            'body' => 'hello this is a test mail'
        ];
        try {
            Mail::to('seppelescur.work@gmail.com','Seppe Lescur')->send(new Contact($data));
            return response()->json(['Mail sent.']);
        } catch (Exception $th) {
            return response()->json(['Something went wrong.']);
        }
        
    }

}
