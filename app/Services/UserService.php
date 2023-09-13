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
}
