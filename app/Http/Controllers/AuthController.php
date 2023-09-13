<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $redirectTo = '/';
    //
    public function register(RegisterUserRequest $request, UserService $userService)
    {
        // Validate the incoming request using the RegisterUserRequest Form Request class.
        // If we have a problem with the validation, Laravel will auto generate the error message JSON
        $validatedData = $request->validated();

        // If the email is unique, proceed with user registration
        $token = $userService->registerUser($validatedData);

        // Return a JSON response with a JWT token (for successful registration)
        return response()->json(['token' => $token], 201); // 201 Created
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
