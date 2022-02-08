<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* si decommenta e si fa questo per non scrivere ogni volta -classe per ogni seeder che devo far migrare nel DB (li facciamo andare a cascata)*/
         $this->call([
             PostsTableSeeder::class, /* facendo così mi basterà lanciare solo il comando php artisan db:seed (senza utilizzare la fleg di classe) */
             CategoriesTableSeeder::class,
         ]);
    }
}
