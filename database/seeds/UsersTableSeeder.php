<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permet de créer des utilisateurs sans les relations
        // factory(\App\User::class, 30)->create();

        // Permet de créer un utilisateur avec un article
//        factory(\App\User::class, 10)->create()->each(function ($u) {
//            $u->posts()->save(factory(\App\Post::class)->make());
//        });

        $user = factory(\App\User::class, 15)->create();
        $user->each(function ($user) {
            factory(\App\Post::class, 20)->create([
               'user_id' => $user->id
            ]);
        });
    }
}
