<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

Route::controller(UserAuthController::class)->group(function () {
    // Login Page
    Route::get('/login', 'loginView')->name('login'); 
    // Login Logic
    Route::post('/login', 'loginAction')->name('login.action'); 
    // Logout Logic
    Route::get('/logout', 'logout')->name('logout'); 
    // Registration Page
    Route::get('/create-account', 'RegView')->name('register'); 
    // Registration Logic
    Route::post('/create-account', 'RegAction')->name('register.create'); 
    // Account Verifition Link
    Route::get('/activate-account/{token}/{email}', 'activeAccount')->name('account.activation');
    // Reset Password Email Code Page
    Route::get('/sendCode', 'sendCodePage')->name('sendCode.page');
    // Reset Password Email Code Logic
    Route::post('/sendCode', 'sendCodeAction')->name('sendCode.action');
    // Reset Password Page
    Route::get('/reset/{token}/{email}', 'resetPage')->name('reset.page');
    // Reset Password Logic
    Route::put('/reset/{token}/{email}/exec', 'resetAction')->name('reset.action');

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
