<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    // Default password for all new accounts
    private const DEFAULT_PASSWORD = 'Changeme123';
    
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
        ]);

        // Make sure we're storing the defaultpassword as a string
        UserAccount::create([
            'username' => $request->username,
            'password' => Hash::make(self::DEFAULT_PASSWORD),
            'defaultpassword' => (string)self::DEFAULT_PASSWORD, // Cast to string explicitly
            'status' => 'active',
        ]);

        return redirect()->back()->with('message', 'User created successfully. Use the default password "'.self::DEFAULT_PASSWORD.'" to log in.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_accounts,username',
            'email' => 'required|email|unique:user_accounts,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = UserAccount::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'defaultpassword' => 'updated', // Not using default password since user set their own
            'status' => 'active',
        ]);

        // Store user in session
        Session::put('user', $user);

        return redirect()->route('dashboard')
            ->with('message', 'Registration successful! Welcome to Mayvèle.');
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

        // Check if user is using the default password
        // For backward compatibility, handle both string values and boolean values
        if ($user->defaultpassword && $user->defaultpassword !== 'updated' && $user->defaultpassword !== false && $user->defaultpassword !== '0') {
            return redirect()->route('password.update.form')
                ->with('message', 'Please update your default password to continue.');
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
        
        // Set to a string value to indicate password has been updated
        $dbUser->defaultpassword = 'updated';
        $dbUser->save();

        // Refresh session user data
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

        return view('dashboard', ['username' => $user->username]);
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
