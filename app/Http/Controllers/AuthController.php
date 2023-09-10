<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        // Validate user input
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Generate and return JWT token
        $token = JWTAuth::fromUser($user);
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Validate user input
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        // Authenticate user
        if(!$token = JWTAuth::attempt($request->only('email','password'))) {
            return response()->json(['error => Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);

    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
