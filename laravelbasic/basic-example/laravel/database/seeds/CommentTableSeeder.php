<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\BlogPost::all();
        if($posts->count() === 0){
            $this->command->info('There are no blog posts, so no comments will be added');
            return;
        }
        $commentcount = (int)$this->command->ask('How many users would you like?', 150);   
        factory(App\Comment::class, $commentcount)->make()->each(function ($comment) use($posts){
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
