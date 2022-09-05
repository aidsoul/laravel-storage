<?php

namespace App\Actions\Admin;

use App\Actions\Admin\User\Update;
use App\Actions\Admin\User\UpdateInterface;

/**
 * @abstract class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
abstract class Admin implements AdminInterface
{
    /**
     * Update user function
     *
     * @return \App\Actions\Admin\User\UpdateInterface
     */
    public static function userUpdate(): UpdateInterface
    {
        return new Update();
    }
}