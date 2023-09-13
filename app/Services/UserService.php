<?php
// app/Services/UserService.php

namespace App\Services;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    public function registerUser(array $userData)
    {
        // Create new user
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
            'is_admin' => false,
        ]);

        // Generate and return JWT token
        $token = JWTAuth::fromUser($user);

        return $token;
    }


    public function loginUser(array $credentials)
    {
        // Authenticate user
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Find the user by email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Check if user is admin
        $isAdmin = $user->is_admin;

        return response()->json([
            'token' => $token,
            'isAdmin' => $isAdmin,
        ]);
    }

}
