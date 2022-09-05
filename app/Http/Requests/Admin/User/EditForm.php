<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class EditForm extends FormRequest
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
        'storage_size' => ['sometimes','integer','max:' . config('storage.max_size')],
        'role' => ['sometimes','boolean'],
        'blocked' => ['sometimes','boolean']
        ];
    }
}
