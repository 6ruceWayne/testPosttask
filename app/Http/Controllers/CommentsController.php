<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }

    public function getComments(Request $request, $sort = 'text', $sortType = 'asc', $page='1', $perPage = '5')
    {
        header("Content-Type: application/json");
        $sort = $request->has('sort') ? $request->input('sort'): $sort;
        $sortType = $request->has('sortType') ? $request->input('sortType'): $sortType;
        $page = $request->has('page') ? $request->input('page'): $page;
        $perPage = $request->has('perPage') ? $request->input('perPage'): $perPage;
        echo json_encode(Comment::orderBy($sort, $sortType)->skip(($page-1)*$perPage)->take($perPage)->get(), JSON_PRETTY_PRINT);
    }

    public function getComment($id)
    {
        header("Content-Type: application/json");
        echo json_encode(Comment::findOrFail($id), JSON_PRETTY_PRINT);
    }

    public function saveComment(Request $request)
    {
        Comment::create([
            'text' => $request->get('text')
          ]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->text = $request->has('text') ? $request->get('text') : $user->text;
        $comment->save();
    }

    public function deleteComment($id)
    {
        Comment::findOrFail($id)->delete();
    }
}
