<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:255',
            'description_ar' => 'required',
            'vision_ar' => 'nullable',
            'massage_ar' => 'nullable',
            'mission_ar' => 'nullable',
            'name_en' => 'required|string|max:255',
            'description_en' => 'required',
            'vision_en' => 'nullable',
            'massage_en' => 'nullable',
            'mission_en' => 'nullable',
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],
            'photo2' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg'],
        ];
    }
}
