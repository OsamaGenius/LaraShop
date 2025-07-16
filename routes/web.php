<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

Route::prefix('/')->group(function() {

    Route::controller(UserAuthController::class)->group(function () {
        // Login Page
        Route::get('login', 'loginView')->name('login'); 
        // Login Logic
        Route::post('login', 'loginAction')->name('login.action'); 
        // Logout Logic
        Route::get('logout', 'logout')->name('logout'); 
        // Registration Page
        Route::get('create-account', 'RegView')->name('register'); 
        // Registration Logic
        Route::post('create-account', 'RegAction')->name('register.create'); 
        // Account Verifition Link
        Route::get('activate-account/{token}/{email}', 'activeAccount')->name('account.activation');
        // Reset Password Email Code Page
        Route::get('sendCode', 'sendCodePage')->name('sendCode.page');
        // Reset Password Email Code Logic
        Route::post('sendCode', 'sendCodeAction')->name('sendCode.action');
        // Reset Password Page
        Route::get('reset/{token}/{email}', 'resetPage')->name('reset.page');
        // Reset Password Logic
        Route::put('reset/{token}/{email}/exec', 'resetAction')->name('reset.action');
    });

    // Homepage Route
    Route::get('/', function () {
        return view('user.home.index');
    })->name('home');
    
    // Shop Page Route
    Route::get('shop', function () {
        return view('user.shop.index');
    })->name('shop');
    
    // About Page Route
    Route::get('about', function () {
        return view('user.about.index');
    })->name('about');
    
    // Contact us Page Route
    Route::get('contact', function () {
        return view('user.contact.index');
    })->name('contact');
    
    // Frequent Asked Question Page Route
    Route::get('FAQ', function () {
        return view('user.faq.index');
    })->name('faq');
    
    // Blogs Page Route
    Route::get('blogs', function () {
        return view('user.blogs.index');
    })->name('blogs');
    
    // Support Page Route
    Route::get('support', function () {
        return view('user.support.index');
    })->name('support');

});