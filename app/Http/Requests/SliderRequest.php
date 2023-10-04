<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
            'title_ar'=>'required',
            'title_en' => 'required',
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg,webp',Rule::requiredIf($this->routeIs('admin.sliders.store'))],
        ];
    }
}
