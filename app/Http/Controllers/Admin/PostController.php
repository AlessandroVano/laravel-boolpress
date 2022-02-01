<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* importiamo il modello */

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
    /*     dump($posts);
 */
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     /*    return ('create new post'); */

     return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // richiamo funzione validazione
          $request->validate($this->validation_rules(), $this->validation_messages());

        $data = $request->all();
        dump($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        /*  return 'show detail' */
         $post = Post::where('slug', $slug)->first();  // il firtst prende tutto quello che è vero 
         
               if(! $post) {
                 abort(404);
                  } 
             return view('admin.posts.show', compact('post'));
                
      }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // VALIDAZIONI 

    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'body' => 'required'
        ];
    }


    // VALIDAZIONI 

    private function validation_messages() {
        return [
            'required' => 'The :attribute is a required filed!!!!',
            'max' => 'Max :max characters allowed for the :attribute'
        ];
    }
}

