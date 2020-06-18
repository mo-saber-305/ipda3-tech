<?php

namespace App\Http\Requests\Dashboard\Services;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicesRequest extends FormRequest
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
            'title' => 'required|unique:services',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,bmp,gif,svg,webp ',
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
            'title.required' => 'يرجي ادخال اسم الخدمة',
            'title.unique' => 'تم استخدام هذا الاسم من قبل من فضلك ضع اسما مخلتفا',
            'content.required' => 'يرجي ادخال محتوي الخدمة',
            'image.required' => 'يرجي ادخال صورة الخدمة',
            'image.image' => 'يجب ان يكون الملف عباره عن صوره',
        ];
    }
}
