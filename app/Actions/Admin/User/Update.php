<?php

namespace App\Actions\Admin\User;

use App\Http\Requests\Admin\User\EditForm;
use App\Models\UserModel;

/**
 * Update user class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Update implements UpdateInterface
{
    /**
     * @param \App\Http\Requests\Admin\User\EditForm $request
     * @param string $id
     * 
     * @return bool
     */
    public function run(EditForm $request, string $id): bool
    {
        $validate = $request->validated();

        if (empty($validate)) {
            return false;
        } else {
            $user = UserModel::find(base64_decode($id));
            $user->update($validate);

            if (isset($validate['role'])) {
                if ($validate['role']) {
                    $user->storage_size = config('storage.max_size');
                } else {
                    $user->storage_size = $user->storage_size - config('storage.max_size');
                    if ($user->storage_size == 0 || $user->storage_size < 0) {
                        $user->storage_size = config('storage.default_user_size');
                    }
                }
            }
            $user->save();

            return true;
        }
    }
}
