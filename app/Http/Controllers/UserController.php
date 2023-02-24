<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    // binding
    public function show(User $user){
        return view('admin.users.profile', ['user' => $user]);
    } 
}
