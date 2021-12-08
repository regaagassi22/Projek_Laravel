<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
Route::resource('cars', \App\Http\Controllers\CarController::class)
    ->middleware('auth');

    Route::get('/home', function() {
        return view('home');
    })->name('home')->middleware('auth');
