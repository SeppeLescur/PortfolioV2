<?php

use App\Http\Controllers\MessageController;
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

Route::get('/contact-me',function() : View{
    return View('contact-me');
})->name('contact-me');
    Route::post('/contact-me/store',[MessageController::class, 'store'])
    ->name('contact-me.store');
    
Route::get('/mail-template',function() : View{
    return View('emails.contact-mail');
})->name('contact-mail-template');