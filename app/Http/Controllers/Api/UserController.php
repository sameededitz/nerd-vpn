<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user(Request $request)
    {
        $user = Auth::user();
        /** @var \App\Models\User $user **/
        return response()->json([
            'status' => true,
            'user' => $user,
            'device_limit' => $user->getSubscriptionDeviceLimit()
        ], 200);
    }
}
