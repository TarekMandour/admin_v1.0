<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable',
            'title_en' => 'nullable',
            'description_en' => 'nullable',
            'link' => 'nullable',
            'type' => 'required',
            'status' => 'required',
            'service_id' => 'nullable',
            'user_id' => 'nullable',
            'category_id'=>'required|exists:categories,id',
        ];
    }
}
