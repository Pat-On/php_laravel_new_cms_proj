<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    //

    // binding
    public function show(User $user)
    {
        return view('admin.users.profile', ['user' => $user]);
    }


    public function index(){
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255', 'alpha_dash'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            // 'password' => ['min:6', 'max:255', 'confirmed'],
        ]);
        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
        // if (request('avatar')) {
        //     dd(request('avatar'));
        // }
    }
}
