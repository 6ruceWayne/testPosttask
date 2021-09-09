<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class PostSeeder extends Seeder
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


        for ($i = 0; $i < $limit; $i++) {
            $post = new Post();
            $post->text = $faker->sentence(4);
            $post->views = rand(1, 20)*50;
            if (rand(0, 1)==1) {
                $post->image = 'https://source.unsplash.com/random';
            }

            $users[rand(0, count($users)-1)]->posts()->save($post);
        }
    }
}
