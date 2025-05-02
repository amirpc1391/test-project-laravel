<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store()
    {
        User::create(request()->only(['name', 'email', 'password']));
        return redirect()->route('users.index');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        if (!$user)
            abort(404);

        return view('panel.users.edit', ['user' => User::find($user_id)]);
    }

    public function update($user_id)
    {
        $user = User::find($user_id);
        $user->update(request()->only(['name', 'email']));
        return redirect()->route('users.index');
    }

    public function destroy($user_id)
    {

        $user = User::find($user_id)->delete();

        return redirect()->route('users.index');
    }


    public function logs($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->to('/users');
        }

        $logs = $user->logs()->get();

        return view('panel.users.logs', ['logs' => $logs,'user'=>$user]);
    }
//    public function logs($id)
//    {
//        return "کاربر شماره $id";
//    }
}
