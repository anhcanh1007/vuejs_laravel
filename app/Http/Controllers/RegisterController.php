<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = $request->all();
        $user['password'] = Hash::make($request->password);
        if($request->validated())
        {
            $user = User::create($user);
            $token = $user->createToken('remember_token')->plainTextToken;
            return response()->json(
                [
                    'message' => 'Register Successfully',
                    'token' => $token
                ], 201);
        }
    }
}
