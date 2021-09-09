<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\User;

class PostsController extends Controller
{
    //
    public function getPosts(Request $request, $sort = 'text', $sortType = 'asc', $page='1', $perPage = '5')
    {
        header("Content-Type: application/json");
        $sort = $request->has('sort') ? $request->input('sort'): $sort;
        $sortType = $request->has('sortType') ? $request->input('sortType'): $sortType;
        $page = $request->has('page') ? $request->input('page'): $page;
        $perPage = $request->has('perPage') ? $request->input('perPage'): $perPage;
        $posts = Post::orderBy($sort, $sortType)->skip(($page-1)*$perPage)->take($perPage)->get();
        foreach ($posts as $post) {
            $comments = $post->comments()->get();
            if (count($comments)>0) {
                foreach ($comments as $comment) {
                    $replies = $comment->replies()->get();
                    $autor = $comment->user()->get();
                    $comment->user = $autor;
                    if (count($replies)>0) {
                        foreach ($replies as $reply) {
                            $replier = $reply->user()->get();
                            $reply->user = $replier;
                        }
                        $comment->replies = $replies;
                    }
                }
                $post->comments = $comments;
            }
        }
        echo json_encode($posts, JSON_PRETTY_PRINT);
    }

    public function getPost($id)
    {
        header("Content-Type: application/json");
        echo json_encode(Post::findOrFail($id), JSON_PRETTY_PRINT);
    }

    public function savePost(Request $request)
    {
        Posts::create([
            'text' => $request->get('text'),
            'views' => $request->get('views'),
            'image' => $request->get('image'),
          ]);
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($id);
        $post->text = $request->has('text') ? $request->get('text') : $post->text;
        $post->views = $request->has('views') ? $request->get('views') : $post->views;
        $post->image = $request->has('image') ? $request->get('image') : $post->image;
        $post->save();
    }

    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
    }
}
