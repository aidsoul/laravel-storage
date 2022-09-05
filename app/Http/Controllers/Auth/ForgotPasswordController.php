<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthF;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordForm;

class ForgotPasswordController extends Controller
{
    /**
     * Go to index forgot password page
     *
     * @return void
     */
    public function index()
    {
        return view('auth.forgot-password');
    }

    /**
     * Forgot password request
     *
     * @param \App\Http\Requests\ForgotPasswordForm $request
     * @return void
     */
    public function forgot(ForgotPasswordForm $request)
    {
        return AuthF::forgot()->password($request) ?
            redirect(route('login'))->with('passwordForgotMessage','Новый пароль был отправлен вам на почту!') :
            back()->withErrors(
                [
                    'email' => 'Пользователь с таким email не найден'
                ]
            );
    }
}
