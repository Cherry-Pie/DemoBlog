<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 5)->create()->each(function($user) {
            $user->posts()->saveMany(factory(\App\Models\Post::class, 20)->make());
        });

        \Yaro\Jarboe\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
