<?php

namespace App\Http\Requests\Dashboard\Clients;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientsRequest extends FormRequest
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
            'name' => 'required|unique:clients',
            'image' => 'required|image|mimes:jpeg,png,bmp,gif,svg,webp',
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
            'name.required' => 'يرجي ادخال اسم العميل',
            'name.unique' => 'تم استخدام هذا الاسم من قبل من فضلك ضع اسما مخلتفا',
            'image.required' => 'يرجي ادخال صورة العميل',
            'image.image' => 'يجب ان يكون الملف عباره عن صوره',
        ];
    }
}
