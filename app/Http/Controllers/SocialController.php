<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // If user exists, update all details except email
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            } else {
                // If user does not exist, create a new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(10)),
                    'email_verified_at' => now(),
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Redirect to the desired page
            return redirect()->route('home')->with([
                'status' => 'success',
                'message' => 'You have successfully logged in with Google'
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions
            Log::error('Error logging in with Google: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['msg' => 'There was an error logging you in with Google.']);
        }
    }
}
