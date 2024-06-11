<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::firstWhere('email', $request['email']);

        if ($user && Hash::check($request['password'], $user->password)) 
        {
            return response()->streamJson([
                'user' => $user,
                'token' => $user->createToken('remember_token')->plainTextToken,
                'message' => 'User logged in successfully'
            ], 200);
        } 
        else {
            return response()->streamJson([
                'message' => 'failed'
            ], 400);
        }
    }
}
