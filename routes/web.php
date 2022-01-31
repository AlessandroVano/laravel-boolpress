<?php

use Illuminate\Support\Facades\Route;
/* use illuminate\Support\Facades\Auth; 

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

    Route::resource('/posts', 'PostController');
}); 


// HOME FRONT - messa come ultima ruoute
Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*'); /* questo serve per atterrare su guest.home, mentre ( * )  indica tutte quelle che non c'entrano con le root di admin  */