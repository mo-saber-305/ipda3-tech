<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'permissions' => 'required',
            'password' => 'required',
            'password_confirmation' => ['required_with:password', 'same:password']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'permissions.required' => 'هذا الحقل مطلوب',
            'password.required' => 'هذا الحقل مطلوب',
            'password_confirmation.required_with' => 'يجب تأكيد كلمة المرور',
            'password_confirmation.same' => 'حقل التأكيد غير مُطابق للحقل',
        ];
    }
}
