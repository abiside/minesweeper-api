<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Arr;

class SignupController extends Controller
{
    public function __invoke(UserRequest $request)
    {
        $newUser = User::create($request->toArray());
    }
}
