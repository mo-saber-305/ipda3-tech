<?php

namespace App\Http\Requests\Dashboard\Pages;

use Illuminate\Foundation\Http\FormRequest;

class CreatePagesRequest extends FormRequest
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
            'title'=> 'required|unique:articles',
            'content'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,bmp,gif,svg,webp',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'يرجي ادخال عنوان الصفحة',
            'title.unique' => 'تم استخدام هذا العنوان من قبل من فضلك ضع عنوانا مخلتفا',
            'content.required' => 'يرجي ادخال محتوي الصفحة',
            'image.required' => 'يرجي ادخال صورة الصفحة',
        ];
    }
}
