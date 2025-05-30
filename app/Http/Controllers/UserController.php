<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\User;
//
//class UserController extends Controller
//{
//    public function index()
//    {
//        $users = User::all();
//        return view('panel.users.index', ['users' => $users]);
//    }
//
//    public function create()
//    {
//        return view('panel.users.create');
//    }
//
//    public function store()
//    {
//        User::create(request()->only(['name', 'email', 'password']));
//        return redirect()->route('users.index');
//    }
//
//    public function edit($user_id)
//    {
//        $user = User::find($user_id);
//        if (!$user)
//            abort(404);
//
//        return view('panel.users.edit', ['user' => User::find($user_id)]);
//    }
//
//    public function update($user_id)
//    {
//        $user = User::find($user_id);
//        $user->update(request()->only(['name', 'email']));
//        return redirect()->route('users.index');
//    }
//
//    public function destroy($user_id)
//    {
//
//        $user = User::find($user_id)->delete();
//
//        return redirect()->route('users.index');
//    }
//
//
//    public function logs($id)
//    {
//        $user = User::find($id);
//
//        if (!$user) {
//            return redirect()->to('/users');
//        }
//
//        $logs = $user->logs()->get();
//
//        return view('panel.users.logs', ['logs' => $logs,'user'=>$user]);
//    }
////    public function logs($id)
////    {
////        return "کاربر شماره $id";
////    }
//}
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all(); // گرفتن تمام نقش‌ها
        return view('panel.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // اضافه کردن نقش‌ها به کاربر
        $user->roles()->attach($request->roles);

        return redirect()->route('users.index');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        if (!$user)
            abort(404);

        $roles = Role::all(); // گرفتن تمام نقش‌ها
        return view('panel.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::find($user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // به‌روزرسانی نقش‌ها
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $user->roles()->detach(); // حذف نقش‌ها از کاربر
            $user->delete(); // حذف کاربر
        }

        return redirect()->route('users.index');
    }
}
