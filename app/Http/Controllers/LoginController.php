<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Handle login authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on user role
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard'); // ✅ Admin Dashboard
            }
            return redirect()->route('user.dashboard'); // ✅ User Dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Handle logout functionality.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to login page
    }
}
