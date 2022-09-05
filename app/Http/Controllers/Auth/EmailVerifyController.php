<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function index()
    {
        return view('auth.verify-email');
    }

    /**
     * Send mail notification function
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function notification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Ссылка для проверки e-mail отправлена!');
    }

    /**
     * Verification mail function
     *
     * @param \Illuminate\Foundation\Auth\EmailVerificationRequest $request
     * @return void
     */
    public function verification(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return view('auth.email-verify-success',['message' => 'Ваша почта подтверждена']);
    }
}
