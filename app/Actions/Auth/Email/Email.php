<?php

namespace App\Actions\Auth\Email;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class Email implements EmailInterface
{
    public function notification(Request $request): void
    {
        $request->user()->sendEmailVerificationNotification();
    }

    public function verification(EmailVerificationRequest $request): void
    {
        $request->fulfill();
    }
}
