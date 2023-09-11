<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $redirectTo = '/';
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
            'is_admin' => false,
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

        // validate that this user actually exists.
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Authenticate user
        if(!$token = JWTAuth::attempt($request->only('email','password'))) {
            return response()->json(['error => Unauthorized'], 401);
        }

        // Check if user is admin
        $isAdmin = $user->is_admin;

        return response()->json([
            'token' => $token,
            'isAdmin' => $isAdmin
        ]);

    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
