<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

Route::controller(UserAuthController::class)->group(function () {
    
    Route::get('/login', 'loginView')->name('login'); 

    Route::get('/create-account', 'RegView')->name('register'); 

});

Route::get('/', function () {
    $test = 'This is test data';
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    $test = 'This is test data';
    return view('about.index');
});

Route::get('/contact', function () {
    $test = 'This is test data';
    return view('contact.index');
});
