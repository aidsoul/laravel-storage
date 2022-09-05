<?php

namespace App\Http\Requests;

use App\Actions\Validators\ValidatorHelp;
use Illuminate\Foundation\Http\FormRequest;

class LoginForm extends FormRequest
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
            'email' => ['required', 'email', 'string','min:3','max:50','regex:/(.+)@(.+)\.(.+)/i'],
            'password' => ['required','string','min:3','max:50','regex:/[^А-Яа-яЁё]/u']
        ];
    }
}
