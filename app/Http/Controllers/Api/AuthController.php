<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
//        $user = User::first();
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));
    }

    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        return response()->json(compact('token'));
    }

    public function logout()
    {
//        auth()->logout();
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
