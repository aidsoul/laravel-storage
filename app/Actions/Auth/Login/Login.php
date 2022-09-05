<?php

namespace App\Actions\Auth\Login;

use App\Http\Requests\LoginForm;
use Illuminate\Support\Facades\Auth;

/**
 * Login user class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Login implements LoginInterface
{
    /**
     * Sign in to your account
     *
     * @param \App\Http\Requests\LoginForm $request
     * @return boolean
     */
    public function store(LoginForm $request): bool
    {
        $validate = $request->validated();
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt($validate,  $remember)) {
            return true;
        }

        return false;
    }
}
