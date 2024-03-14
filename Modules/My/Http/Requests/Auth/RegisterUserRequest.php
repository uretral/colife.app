<?php

namespace Modules\My\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Modules\My\Entities\User;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'  => ['required', Rules\Password::defaults()],
            'avatar'    => ['mimes:jpg,jpeg,bmp,png,gif,svg,pdf,ico'],
            'agreement' => ['required']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
