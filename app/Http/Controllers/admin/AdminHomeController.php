<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function dashboard(Request $request)
    {

        return view('admin.dashboard');
    }
}
