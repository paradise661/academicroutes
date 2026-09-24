<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIeltsRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'program_enrollment' => 'required|string',
            'program_other' => 'nullable|string|max:255',
            'class_type' => 'required|string',
            'deposit_made' => 'required|boolean',
            'deposit_amount' => 'nullable|numeric|min:0',
            'preferred_joining_date' => 'required|date',
            'preferred_timing' => 'required|string|max:255',
            'timing_other' => 'nullable|string|max:255',
            'university_applied' => 'required|boolean',
            'university_name' => 'nullable|string|max:255',
            'university_other' => 'nullable|string|max:255',
            'country_interest' => 'required|string|max:255',
            'consultancy' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
        ];
    }
}