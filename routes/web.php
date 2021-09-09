<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/GET/users', 'UsersController@getUsers');
Route::get('/GET/users/{id}', 'UsersController@getUser');
Route::post('/POST/user', 'UsersController@saveUser');
Route::patch('/PATCH/user/{id}', 'UsersController@update');
Route::delete('/DELETE/user/{id}', 'UsersController@deleteUser');

Route::get('/GET/posts', 'PostsController@getPosts');
Route::get('/GET/posts{id}', 'PostsController@getPost');
Route::post('/POST/post', 'PostsController@savePost');
Route::patch('/PATCH/post', 'PostsController@update');
Route::delete('/DELETE/post/{id}', 'PostsController@deletePost');

Route::get('/GET/comments', 'CommentsController@getComments');
Route::get('/GET/comments/{id}', 'CommentsController@getComment');
Route::post('/POST/comment', 'CommentsController@saveComment');
Route::patch('/PATCH/comment', 'CommentsController@update');
Route::delete('/DELETE/comment/{id}', 'CommentsController@deleteComment');
