<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $test = 'This is test data';
    return view('home.index');
});

Route::get('/about', function () {
    $test = 'This is test data';
    return view('about.index');
});

Route::get('/contact', function () {
    $test = 'This is test data';
    return view('contact.index');
});
