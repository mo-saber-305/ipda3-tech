<?php

namespace App\Http\Requests\Dashboard\Articles;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticlesRequest extends FormRequest
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
            'title.required' => 'يرجي ادخال عنوان المقالة',
            'title.unique' => 'تم استخدام هذا العنوان من قبل من فضلك ضع عنوانا مخلتفا',
            'content.required' => 'يرجي ادخال محتوي المقالة',
            'image.required' => 'يرجي ادخال صورة المقالة',
        ];
    }
}
