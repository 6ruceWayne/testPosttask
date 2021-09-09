<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        $limit = 10;

        $users = User::all();
        $posts = Post::all();

        for ($i = 0; $i < $limit; $i++) {
            $comment = new Comment();
            $comment->text = $faker->sentence(4);
            $users[rand(0, count($users)-1)]->comments()->save($comment);
            $posts[rand(0, count($posts)-1)]->comments()->save($comment);
        }

        $comments = Comment::all();

        for ($i=0;$i<count($comments);$i++) {
            if (rand(0, 1)==1) {
                $reply = new Comment();
                $reply->text = $faker->sentence(4);
                $comment = $comments[$i];
                $reply->user_id = $users[rand(0, count($users)-1)]->id;
                $reply->parent_id = $comment->id;
                $comments[$i]->replies()->save($reply);
            }
        }
    }
}
