<?php

namespace App\Actions\Admin;

use App\Actions\Admin\User\UpdateInterface;

interface AdminInterface
{
    /**
     * Update user function
     *
     * @return \App\Actions\Admin\User\UpdateInterface
     */
    public static function userUpdate(): UpdateInterface;
}