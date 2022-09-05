<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthF;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterForm;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.registaration');
    }

    public function store(RegisterForm $request)
    {
        return AuthF::register()->store($request) ? 
        redirect(route('verification.notice')) : false;
    }
}
