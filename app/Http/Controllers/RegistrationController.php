<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('register.register_view');
    }

    public function login()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        // ✅ Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Store in Users Table using the User Model
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // ✅ Hash the password
        $user->save();

        // ✅ Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registered Successfully! Please log in.');
    }
}
