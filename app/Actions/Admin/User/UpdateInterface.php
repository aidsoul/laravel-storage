<?php

namespace App\Actions\Admin\User;

use App\Http\Requests\Admin\User\EditForm;
use App\Models\UserModel;

interface UpdateInterface
{
    /**
     * @param \App\Http\Requests\Admin\User\EditForm $request
     * @param string $id
     * 
     * @return bool
     */
    public function run(EditForm $request, string $id): bool;
}