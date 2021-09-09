<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //

    public function getUsers(Request $request, $sort = 'first_name', $sortType = 'asc', $page='1', $perPage = '5')
    {
        header("Content-Type: application/json");
        $sort = $request->has('sort') ? $request->input('sort'): $sort;
        $sortType = $request->has('sortType') ? $request->input('sortType'): $sortType;
        $page = $request->has('page') ? $request->input('page'): $page;
        $perPage = $request->has('perPage') ? $request->input('perPage'): $perPage;
        echo json_encode(User::orderBy($sort, $sortType)->skip(($page-1)*$perPage)->take($perPage)->get(), JSON_PRETTY_PRINT);
    }

    public function getUser($id)
    {
        header("Content-Type: application/json");
        echo json_encode(User::findOrFail($id), JSON_PRETTY_PRINT);
    }

    public function saveUser(Request $request)
    {
        User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
          ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->has('first_name') ? $request->get('first_name') : $user->first_name;
        $user->last_name = $request->has('last_name') ? $request->get('last_name') : $user->last_name;
        $user->gender = $request->has('gender') ? $request->get('gender') : $user->gender;
        $user->date_of_birth = $request->has('date_of_birth') ? $request->get('date_of_birth') : $user->date_of_birth;
        $user->save();
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
    }
}
