<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationCreateRequest extends FormRequest
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
            'theme' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:3|max:255',
            'thumbnail' => 'required|image|mimes:png,jpeg,jpg,pdf|nullable|max:1999',
        ];
    }
}
