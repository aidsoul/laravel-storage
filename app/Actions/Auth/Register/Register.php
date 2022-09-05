<?php

namespace App\Actions\Auth\Register;

use App\Http\Requests\RegisterForm;
use App\Models\FolderModel;
use App\Models\UserModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

/**
 * User registration class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Register implements RegisterInterface
{
    /**
     * Perform user registration
     *
     * @param \App\Http\Requests\RegisterForm $request
     * @return boolean
     */
    public function store(RegisterForm $request): bool
    {
        $validate = $request->validated();
        if(!UserModel::exists())
        {   $validate['role'] = 1;
            $validate['storage_size'] = config('storage.max_size');
            $user = UserModel::create($validate);
        }else{
            $user = UserModel::create($validate);
        }

        FolderModel::create([
            'name' => $user->email,
            'user_id' => $user->id,
        ]
        );

        Storage::disk('private')->makeDirectory($user->email);

        if($user)
        {
            auth()->login($user); 
            event(new Registered($user));

            return route('verification.notice');
        }
    }
}
