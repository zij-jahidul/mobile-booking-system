<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function newUser()
    {
        $users = User::orderBy('id', 'desc')->get()->toArray();
        return view('admin.user.new_user',[
            'users' => $users,
        ]);
    }
}
