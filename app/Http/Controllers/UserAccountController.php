<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    // Show form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_accounts,username',
            'defaultpassword' => 'required|min:6',
        ]);

        UserAccount::create([
            'username' => $request->username,
            'password' => Hash::make($request->defaultpassword),
            'defaultpassword' => $request->defaultpassword,
        ]);

        return redirect()->back()->with('message', 'User created successfully.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = UserAccount::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials.');
        }

        // Store user in session
        Session::put('user', $user);

        if ($request->password === $user->defaultpassword) {
            return redirect()->route('password.update.form');
        }

        return redirect()->route('dashboard');
    }

    // Show update password form
    public function showUpdatePasswordForm()
    {
        return view('auth.update-password');
    }

    // Handle password update
    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }

        $dbUser = UserAccount::find($user->id);
        $dbUser->password = Hash::make($request->new_password);
        $dbUser->defaultpassword = null;
        $dbUser->save();

        // Refresh session user data with updated info
        Session::put('user', $dbUser);

        return redirect()->route('dashboard')->with('message', 'Password updated successfully.');
    }

    // Dashboard page (protected)
    public function dashboard()
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('users.login')->with('error', 'Please log in first.');
        }

        return view('dashboard');
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Clear user session
        Session::forget('user');

        // Optionally, invalidate session and regenerate token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logged out successfully.');
    }
}
