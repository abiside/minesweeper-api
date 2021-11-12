<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class SignupController extends Controller
{
    public function __invoke(UserRequest $request)
    {
        $newUser = User::create($request->toArray());

        return UserResource::make(tap($newUser)->generateNewAccessToken());
    }
}
