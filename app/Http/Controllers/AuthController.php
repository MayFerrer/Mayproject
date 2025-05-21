<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAccount;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = UserAccount::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]);

            if ($user->defaultpassword) {
                return redirect('/change-password');
            }

            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function showChangePassword()
    {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = UserAccount::find(session('user_id'));
        $user->password = Hash::make($request->password);
        $user->defaultpassword = false;
        $user->save();

        return redirect('/dashboard')->with('message', 'Password updated successfully.');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
