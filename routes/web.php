<?php

use Illuminate\Support\Facades\Route;
/* use illuminate\Support\Facades\Auth; */

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

// HOME FRONT
Route::get('/', function () {
    return view('guests.home');
});


// ROTTE X AUTENTICAZIONE
Auth::routes();


// ROOT X AREA ADMIN
/* Route::get('/home', 'HomeController@index')->name('home'); */

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function(){
    
    //Admin homepage
    Route::get('/', 'HomeController@index')->name('home');

    //posts resource routes
}); 
