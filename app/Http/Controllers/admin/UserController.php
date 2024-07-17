<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Adjust this to your actual User model namespace


class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users

        return view('admin.users.index', ['users' => $users]);
    }
}
