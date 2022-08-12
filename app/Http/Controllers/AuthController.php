<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $token = null;
        $status = 400;

        // Just static test data
        if ($request->username == 'test' && $request->password == 'testpassword') {
            $token = 'success-token';
            $status = 200;
        }

        return response()->json([
            'token' => $token
        ], $status);
    }
}
