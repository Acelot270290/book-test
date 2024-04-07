<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\UserAction;

class AuthController extends Controller
{
    protected $userAction;

    public function __construct(UserAction $userAction)
    {
        $this->userAction = $userAction;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $loginResponse = $this->userAction->login($credentials);

        if (isset($loginResponse['error'])) {
            return response()->json(['error' => $loginResponse['error']], $loginResponse['status']);
        }

        return response()->json($this->userAction->respondWithToken($loginResponse['token']));
    }
}
