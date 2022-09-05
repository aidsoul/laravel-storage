<?php

namespace App\Actions\Auth;

use App\Actions\Auth\Email\EmailInterface;
use App\Actions\Auth\Forgot\ForgotInterface;
use App\Actions\Auth\Login\LoginInterface;
use App\Actions\Auth\Register\RegisterInterface;

interface AuthIFInterface
{
    /**
     * Auth forgot
     *
     * @return \App\Actions\Auth\Forgot\ForgotInterface
     */
    public static function forgot(): ForgotInterface;
    /**
     * Auth login
     *
     * @return \App\Actions\Auth\Login\LoginInterface
     */
    public static function login(): LoginInterface;

    /**
     * Auth register
     *
     * @return \App\Actions\Auth\Register\RegisterInterface
     */
    public static function register(): RegisterInterface;

    /**
     * Auth email
     *
     * @return \App\Actions\Auth\Email\EmailInterface
     */
    public static function email(): EmailInterface;
}
