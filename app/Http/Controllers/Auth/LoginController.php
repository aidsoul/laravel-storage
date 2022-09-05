<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthF;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginForm;

class LoginController extends Controller
{
    public function store(LoginForm $request)
    {
        return AuthF::login()->store($request) ? redirect(route('storage')) :
            redirect()->back()
            ->withErrors([
                'email' => 'Ошибка! Не найдены или неверно указаны данные для аутентификации пользователя'
            ]);
    }

    public function create()
    {
        return view('auth.login');
    }
}
