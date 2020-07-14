<?php

namespace App\Http\Requests\Dashboard\Projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'cover_image'=> 'required|image|mimes:jpeg,png,bmp,gif,svg,webp',
            'project_images'=> 'required',
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
            'title.required' => 'يرجي ادخال عنوان المشروع',
            'title.unique' => 'تم استخدام هذا العنوان من قبل من فضلك ضع عنوانا مخلتفا',
            'content.required' => 'يرجي ادخال محتوي المشروع',
            'image.required' => 'يرجي ادخال صورة المشروع',
            'image.image' => 'يجب ان يكون الملف عباره عن صوره',
            'cover_image.required' => 'يرجي ادخال صورة خلفية المشروع',
            'cover_image.image' => 'يجب ان يكون الملف عباره عن صوره',
            'project_images.required' => 'يرجي ادخال صور المشروع الاساسيه',
            'project_images.image' => 'يجب ان يكون الملف عباره عن صوره',
        ];
    }
}
