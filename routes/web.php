<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailWelcome;
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

use App\Jobs\SendWelcomeEmailJob;

Route::get('test', function () {
    
    dispatch(new SendWelcomeEmailJob());

    dd('sent');
});

Route::get('/send-mail', function(){
    Mail::to('yeasinshuvo76@gmail.com')->send(new SendEmailWelcome('yeasin'));
});