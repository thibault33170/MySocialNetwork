<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\Article::class, 100)->create();
        factory(App\Like::class, 300)->create();
        factory(App\Follow::class, 40)->create();
        factory(App\Comment::class, 200)->create();
    }
}
