<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password, [])) {
            return response()->json([
                'message' => 'User not exist'
            ], 404);
        }

        $token = $user->createTOken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'đăng nhập thành công',
            'access_token' => $token,
            'type_token' => 'Bearer'
        ], 200);
    }
}
