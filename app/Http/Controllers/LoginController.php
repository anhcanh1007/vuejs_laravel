<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // if ($request->validated()){
        //     $user = User::where('email', $request->email)->first();
        //     if($user == null)
        //     {
        //         return response()->json([
        //             'message' => 'Email not exits'
        //         ], 404);
        //     }else{
        //         if (!Hash::check($request->password, $user->password, [])) {
        //             $message_error = 'Password không đúng';
        //             return response()->json($message_error, 404);
        //         }else{
        //             $token = $user->createToken('authToken')->plainTextToken;
        //             return response()->json([
        //                 'user' => $user,
        //                 'message' => 'login succesfully',
        //                 'access_token' => $token,
        //                 'type_token' => 'Bearer'
        //             ], 200);
        //         }
        //     }
        // }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('authToken')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'user login successfully'
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'success' => false,
                'message' => 'Email hoặc mật khẩu không đúng'
            ];
            return response()->json($response);
        }

    }

    public function logout(Request $request){
        $user = $request->user();
        return response()->json(['message' => 'logout']);
    }
}
