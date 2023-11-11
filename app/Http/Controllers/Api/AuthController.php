<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Auth\LoginResource;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {



        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken("myToken")->plainTextToken;
        return LoginResource::make([
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],

        ]);
    }
}
