<?php

namespace App\Actions\Auth\Forgot;

use App\Http\Requests\ForgotPasswordForm;
use App\Mail\ForgotPasswordMail;
use App\Models\UserModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Forgot password class
 * 
 * @license 
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Forgot implements ForgotInterface
{

    /**
     * @var string
     */
    private string $password;

    /**
     * Sends a new password to the email
     * 
     * @param string $email
     * @return void
     */
    private function sendMail(string $email): void
    {
        Mail::to($email)->send(new ForgotPasswordMail($this->password));
    }

    /**
     * Update User Password
     *
     * @param \App\Models\User $user
     * @return void
     */
    private function updateUserPassword(UserModel $user): void
    {
        $user->password = $this->password;
        $user->save();
    }

    /**
     * Sending status of the request execution
     *
     * @param \App\Http\Requests\ForgotPasswordForm $request
     * @return boolean
     */
    public function password(ForgotPasswordForm $request): bool
    {
        $email = $request->validated()['email'];
        $user = UserModel::where(['email' =>  $email])->first();
        if ($user) {
            $this->password = Str::random(33);
            $this->sendMail($email);
            $this->updateUserPassword($user);

            return true;
        }

        return false;
    }
}
