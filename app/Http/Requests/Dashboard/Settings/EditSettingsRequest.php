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
            'address' => 'required',
            'slogan_content' => 'required',
            'intro_content' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'whatsapp' => 'required',
            'site_icon' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
            'intro_image' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
            'slogan_image' => 'image|mimes:jpeg,png,bmp,gif,svg,webp',
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
            'slogan_content.required' => 'يرجي ادخال محتوي slogan',
            'intro_content.required' => 'يرجي ادخال محتوي intro',
            'address.required' => 'يرجي ادخال العنوان',
            'facebook.required' => 'يرجي ادخال لينك facebook',
            'twitter.required' => 'يرجي ادخال لينك twitter',
            'instagram.required' => 'يرجي ادخال لينك instagram',
            'linkedin.required' => 'يرجي ادخال لينك linkedIn',
            'whatsapp.required' => 'يرجي ادخال لينك whatsApp',
            'site_icon.image' => 'يجب ان يكون الملف عباره عن صوره',
            'intro_image.image' => 'يجب ان يكون الملف عباره عن صوره',
            'header_logo.image' => 'يجب ان يكون الملف عباره عن صوره',
            'footer_logo.image' => 'يجب ان يكون الملف عباره عن صوره',
            'footer_image.image' => 'يجب ان يكون الملف عباره عن صوره',
        ];
    }
}
