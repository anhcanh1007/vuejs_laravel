<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user == null)
        {
            return response()->json([
                'message' => 'Email not exits',
                'sucess' => 'false',
            ], 404);
        }else{
            if (!Hash::check($request->password, $user->password, [])) {
                return response()->json([
                    'message' => 'Password false'
                ], 404);
            }else{
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'user' => $user,
                    'message' => 'login succesfully',
                    'access_token' => $token,
                    'type_token' => 'Bearer'
                ], 200);
            }
        }
    }

    public function logout(Request $request){
        $user = $request->user();
        dd($user);
        return response()->json(['message' => 'logout']);
    }
}
