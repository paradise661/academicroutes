<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateSliderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', // Adjust max length as needed
            'order' => 'nullable|integer|min:1', // Ensures order is a positive integer if present
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ];
    }
}
