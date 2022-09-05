<?php 

namespace App\Actions\Auth\Forgot;

use App\Http\Requests\ForgotPasswordForm;
use Illuminate\Http\RedirectResponse;

interface ForgotInterface
{
    public function password(ForgotPasswordForm $request);
}
