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
      /*  $posts = Post::paginate(3); */
       // ordinazione post dal più recente
      $posts = Post::orderBy('id', 'desc')->paginate(3);

       

       return response()->json($posts);    /* json() mi prende i dati in struttura php e li trasforma in formato json */
    }

    /* pagina di dettaglio */

    public function show($slug) {

        // prendere post con lo slug

        /* A. post senza tag e categorie */
      /*   $post = Post::where('slug', $slug)->first(); */ /*  $slug parametro passato nella rotta  del controller */
        
        /* B. */
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        /* serve per determinare se esiste oppure no quindi se scrivo uno slug non esistente mi porta alla pagina 404 che ho creato */
          if(! $post) {
           $post['not_found'] = true;
         } elseif ($post->cover) {
              $post->cover = url('storage/' . $post->cover);
         }
        // ritorno dati in json
        return response()->json($post);
    }
}
