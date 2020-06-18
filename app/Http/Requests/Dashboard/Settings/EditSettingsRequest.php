<?php

namespace App\Http\Requests\Dashboard\Settings;

use Illuminate\Foundation\Http\FormRequest;

class EditSettingsRequest extends FormRequest
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
            'slogan' => 'required',
            'intro_image' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
            'header_logo' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
            'footer_logo' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
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
            'slogan.required' => 'يرجي ادخال محتوي slogan',
            'intro_image.image' => 'يجب ان يكون الملف عباره عن صوره',
            'header_logo.image' => 'يجب ان يكون الملف عباره عن صوره',
            'footer_logo.image' => 'يجب ان يكون الملف عباره عن صوره',
        ];
    }
}
