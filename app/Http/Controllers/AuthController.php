<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Manage Sign in User
    public function signIn(SignInRequest $request) {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user['password'])){
            return response()->json([
                'message'       => 'Username or password is incorrect'
            ], 401);
        }

        $token = $user->createToken('access_token', ['access-api'])->plainTextToken;

        return response()->json([
            'user'      => new UserResource($user),
            'token'     => $token
        ]);
    }

    // Manage Sign up user
    public function signUp(SignUpRequest $request) {
        $data = $request->validated();

        $storeUser = User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => $data['role'],
            'status'    => $data['status']
        ]);

        $token = $storeUser->createToken('access_token', ['access-api'])->plainTextToken;

        return response()->json([
            'user'      => new UserResource($storeUser),
            'token'     => $token,
        ]);
    }

    // Manage Sign out user
    public function signOut(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message'   => 'Logged out successfully'
        ]);
    }

    // Manage Reset Password
    public function resetPassword(User $user) {

    }

    
}
