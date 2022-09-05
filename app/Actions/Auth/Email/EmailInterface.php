<?php 

namespace App\Actions\Auth\Email;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

interface EmailInterface
{
    public function notification(Request $request): void;
    public function verification(EmailVerificationRequest $request): void;
}
