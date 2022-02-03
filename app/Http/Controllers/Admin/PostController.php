<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

     $categories = Category::all();

     return view('admin.posts.create', compact('categories'));
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

        // CREAZIONE NUOVO POST
        $new_post = new Post();

        // GENERAZIONE SLUG UNIVOCO
         $slug = Str::slug($data['title'], '-'); // mi genera titoli -2 -3 -4 -5 in seguenza ad ogni creazione post
         $count = 1;
         $base_slug = $slug; // titolo della form

         // ESECUZIONE CICLO SE HO TROVATO UN POST CON LO SLUG ATTUALE
         while(Post::where('slug', $slug)->first()) {
             //genera un nuovo slug con il contatore annesso come riportato a riga 58
             $slug = $base_slug . '-' . $count;
             $count++;
         }
         $data['slug'] = $slug;

         $new_post->fill($data);
         $new_post->save();

         return redirect()->route('admin.posts.show', $new_post->slug);
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
        $post = Post::find($id);

        if(! $post) {
            abort(404);
        }
        return view('admin.posts.edit', compact('post'));
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
          // richiamo funzione validazione
          $request->validate($this->validation_rules(), $this->validation_messages());

          $data = $request->all();
         /*  dump($data); */
            
             // UPDATE RECORD
             $post = Post::find($id);

          // update dello slug solo se il titolo cambia
          if($data['title'] != $post->title ) {
            $slug = Str::slug($data['title'], '-'); // mi genera titoli -2 -3 -4 -5 in seguenza ad ogni creazione post
            $count = 1;
            $base_slug = $slug; // titolo della form
   
            // ESECUZIONE CICLO SE HO TROVATO UN POST CON LO SLUG ATTUALE
            while(Post::where('slug', $slug)->first()) {
                //genera un nuovo slug con il contatore annesso come riportato a riga 58
                $slug = $base_slug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
          }
          else {
              $data['slug'] = $post->slug;
          }

          $post->update($data);

          return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }

    // VALIDAZIONI 

    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }


    // VALIDAZIONI /*  */

    private function validation_messages() {
        return [
            'required' => 'The :attribute is a required filed!!!!',
            'max' => 'Max :max characters allowed for the :attribute',
            'category_id.exists' => 'The selected category does not exists.'
        ];
    }
}

