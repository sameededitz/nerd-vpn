<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($loginType, $request->name)->first();
        if(!$user){
            return back()->withErrors([
                'name' => "We couldn't find an account with that " . ($loginType == 'email' ? 'email' : 'username') . ".",
            ]);
        }

        $credentials = [
            $loginType => $request->name,
            'password' => $request->password,
        ];
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin-home');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'tos' => 'required|in:on',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->sendEmailVerificationNotification();
        Auth::login($user);
        return redirect()->route('home');
    }
}
