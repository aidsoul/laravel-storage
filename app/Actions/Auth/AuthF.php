<?php

namespace App\Actions\Auth;

use App\Actions\Auth\Email\Email;
use App\Actions\Auth\Email\EmailInterface;
use App\Actions\Auth\Forgot\Forgot;
use App\Actions\Auth\Forgot\ForgotInterface;
use App\Actions\Auth\Login\Login;
use App\Actions\Auth\Login\LoginInterface;
use App\Actions\Auth\Register\Register;
use App\Actions\Auth\Register\RegisterInterface;

/**
 * Abstract class AuthF
 * Factory for obtaining a class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
abstract class AuthF implements AuthIFInterface
{
    /**
     * Auth login
     *
     * @return \App\Actions\Auth\Login\LoginInterface
     */
    public static function login(): LoginInterface
    {
        return new Login();
    }

    /**
     * Auth register
     *
     * @return \App\Actions\Auth\Register\RegisterInterface
     */
    public static function register(): RegisterInterface
    {
        return new Register();
    }

    /**
     * Auth forgot
     *
     * @return \App\Actions\Auth\Forgot\ForgotInterface
     */
    public static function forgot(): ForgotInterface
    {
        return new Forgot();
    }

    /**
     * Auth email
     *
     * @return \App\Actions\Auth\Email\EmailInterface
     */
    public static function email(): EmailInterface
    {
        return new Email();
    }
}
