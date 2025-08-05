<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/insights', function () {
    return view('insights');
})->name('insights');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/offices', function () {
    return view('offices');
})->name('offices');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::post('/contact', function () {
    // Handle contact form submission
    // You can add form validation and email sending logic here
    return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon!');
})->name('contact.submit');
