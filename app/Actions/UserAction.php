<?php

namespace App\Actions;

use Tymon\JWTAuth\Facades\JWTAuth;

class UserAction
{
    public function login($credentials)
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return ['error' => 'Unauthorized', 'status' => 401];
            }
            return ['token' => $token, 'status' => 200];
        } catch (\Exception $e) {
            return ['error' => 'could_not_create_token', 'status' => 500];
        }
    }

    public function respondWithToken($token)
    {
        $ttl = config('jwt.ttl') * 60;

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl
        ];
    }
}
