<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Home Page';
});

// Route::get('/hello', function() {
//     return 'Hello World';
// });

Route::get('greet/{name}', function($name) {
    return 'Hello ' . $name . '!';
}); // Adding dynamic parts in the URL

// HTTP methods
// GET - to read data. fetch documents
// POST - to store new data, send forms 
// PUT - to modify existing data
// DELETE - to delete existing data

Route::get('/hallo', function() {
    return redirect() -> route('hello');
});

// named routes
Route::get('/hello', function() {
    return 'Hello World';
}) -> name('hello');

// Define fallback routes
Route::fallback(function() {
    return '404';
});