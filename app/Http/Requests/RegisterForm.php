<?php

namespace App\Http\Requests;

use App\Actions\Validators\ValidatorHelp;
use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required','email', 'string', 'unique:users,email','max:50','regex:/(.+)@(.+)\.(.+)/i'],
            'password' => ['required','min:6','max:50','regex:/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/u'],
            'password_confirmation' => ['required','same:password', 'min:6','max:50','regex:/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/u'],
            'firstname' => ['required', 'string','min:3','max:45','regex:/[А-Яа-яЁё]/u'],
            'lastname' => ['required', 'string','min:3','max:45','regex:/[А-Яа-яЁё]/u']
        ];
    }
}