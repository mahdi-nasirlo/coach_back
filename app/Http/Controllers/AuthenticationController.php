<?php

namespace App\Http\Controllers;


use App\Actions\Auth\LoginAction;
use App\Actions\Auth\RegisterAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Traits\ApiResponseHelper;

class AuthenticationController extends Controller
{
    use  ApiResponseHelper;

    public function Login(LoginRequest $request, LoginAction $action)
    {
        $token = $action->execute($request);

        return $this->respondWithSuccess(["token" => $token]);
    }

    public function Register(RegisterRequest $request, RegisterAction $action)
    {
        $token = $action->execute($request);

        return $this->respondWithSuccess(["token" => $token]);
    }
}
