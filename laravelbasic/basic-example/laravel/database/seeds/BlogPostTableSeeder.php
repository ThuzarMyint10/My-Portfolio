<?php

use Illuminate\Database\Seeder;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogcount = (int)$this->command->ask('How many blogposts would you like?', 50);
        $users = App\User::all();
            factory(App\BlogPost::class, $blogcount)->make()->each(function($post) use($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
