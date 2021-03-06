<?php

use Illuminate\Database\Seeder;
/* importazione Str */
use Illuminate\Support\Str;
/* importazione modello */
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++) {

            /* richiamo del modello */
           $new_post = new Post();


           $new_post->title = 'Post title' . ($i + 1);
           $new_post->slug = Str::slug( $new_post->title, '-');
           $new_post->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';


           /* salvataggio colonne  */

           $new_post->save();
        }
    }
}
