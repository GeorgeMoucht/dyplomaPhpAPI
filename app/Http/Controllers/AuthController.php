<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
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

    public function login(LoginUserRequest $request, UserService $userService)
    {
        // Validate user input
        $validatedData = $request->validated();

        // validate that this user actually exists.
        $user = User::where('email', $request->email)->first();

        return $userService->loginUser($validatedData);


    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
