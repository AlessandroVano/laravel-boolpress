<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            //FOREIGN KEY POST
             $table->unsignedBigInteger('post_id');

             $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    /*quando cancelliamo un post a cascata cancelliamo anche la row  */
                    ->onDelete('cascade');


            //FOREIGN KEY TAG
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');


          /*   $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
