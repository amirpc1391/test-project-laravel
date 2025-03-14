<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', ['users' => $users]);
    }

    public function store()
    {
        User::create(request()->only(['name', 'email', 'password']));
        return redirect()->to('/users');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        if(!$user)
            abort(404);

        return view('edit', ['user' => User::find($user_id)]);
    }

    public function update($user_id)
    {
        $user = User::find($user_id);
        $user->update(request()->only(['name', 'email']));
        return redirect()->to('/users');
    }
    public function destroy($user_id)
    {

        $user = User::find($user_id)->delete();
       
        return redirect()->to('/users');
    }
}
