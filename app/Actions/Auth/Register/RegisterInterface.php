<?php 

namespace App\Actions\Auth\Register;

use App\Http\Requests\RegisterForm;

interface RegisterInterface
{
    public function store(RegisterForm $request): bool;
}
