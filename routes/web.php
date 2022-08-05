<?php

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
    Mail::send('email',[], function($message) {
        $message->to("test@example.com", "Laravel Mail User")
        ->subject("Laravel Mail Testing");
    });
    echo "Mail Sent";
}); 