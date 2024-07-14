<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('pages.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            // Add other fields validation rules
        ]);

        // Update user data
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        // Update other fields as needed
        $user->save();

        // Redirect back or to another page
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
