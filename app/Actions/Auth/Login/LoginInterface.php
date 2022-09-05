<?php 

namespace App\Actions\Auth\Login;

use App\Http\Requests\LoginForm;

interface LoginInterface
{
    public function store(LoginForm $request): bool;
}
