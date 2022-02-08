<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    /* archivio esposto in json */

    public function index() {
       /*  return 'POST JSON'; */

       // senza paginazione
       /* $posts = Post::all(); */

       // con paginazione
       $posts = Post::paginate(3);

       

       return response()->json($posts);    /* json() mi prende i dati in struttura php e li trasforma in formato json */
    }
}
