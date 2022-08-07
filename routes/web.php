<?php

use App\Jobs\SendTestMailJob;
use App\Mail\SendMarkdownMail;
use App\Mail\SendTestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('mail-test', function() {
    // Mail::send('email',[], function($message) {
    //     $message->to("test@example.com", "Laravel Mail User")
    //     ->subject("Laravel Mail Testing");
    // });

    // Mail::to("test1@test.com")->send(new SendTestMail()); 

    // Mail::to("test1@test.com")->send(new SendMarkdownMail("Jim")); 

    // dispatch(function() {
    //     Mail::to("test1@example.com")
    //     ->send(new SendMarkdownMail('Tim'));
    // })->delay(now()->addSeconds(7));  
    
    SendTestMailJob::dispatch()->delay(now()->addSeconds(5));

    echo "Mail Sent";
});