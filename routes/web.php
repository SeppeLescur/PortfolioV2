<?php

use App\Http\Controllers\ContactController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/',function() : View{
    return View('index');
})->name('index');
Route::get('/about',function() : View{
    return View('about');
})->name('about');
Route::get('/projects',function() : View{
    return View('projects');
})->name('projects');

Route::get('/contact-me/', [ContactController::class, "show"])->name('contact.show');
Route::post('/contact-me/', [ContactController::class, "send"])->name('contact.send');

Route::get('/mail-template',function() : View{
    return View('emails.contact-mail');
})->name('contact-mail-template');
