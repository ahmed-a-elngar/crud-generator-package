<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;

class AuthController extends Controller
{
    use ResponseTrait;

    public function register(StoreUserRequest $request)
    {

        $inputs               =   $request->validated();
        $inputs['password']   =   bcrypt($inputs['password']);
        $user                =   User::create($inputs);
        $user['token'] = $user->createToken('accessToken')->plainTextToken;

        return $this->sendResponse('User register successfully.', new UserResource($user));
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            auth()->user()->tokens()->delete();

            $user['token']   =   $user->createToken('accessToken')->plainTextToken;

            return $this->sendResponse('User login successfully.', new UserResource($user));
        } else {
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
        }
    }
}
