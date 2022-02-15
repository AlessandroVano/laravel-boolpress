<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

// TEST ROUTE API

/* le nostre url inziano con/api/... */
Route::get('/test', function() {
  /*   return 'Hello'; */

  // return dati json

  /* return response()->json([ */
      /* 'clients' => ['Alessandro', 'Federico', 'Calogero'], */  /* 'client', 'lorem'  (sono i nomi dei nostri oggetti*/
      /* 'lorem' => 'ipsum', */
  /* ]); */
});


// TUTTI GLI ENDPOINT PER LE API

Route::namespace('Api')->group(function() {       /* name space (Api(cartella che ho creato dove ho il controller))
                                                                     (group (mi prende tutto il gruppo che creo in seguito)) */
  // archivio dei post  
  Route::get('/posts', 'PostController@index');

  // rotta x singolo post

  Route::get('/posts/{slug}', 'PostController@show');

  // Contact
  Route::post('/contacts', 'ContactController@store');
});
