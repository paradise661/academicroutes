<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit the form
    }

    public function rules()
    {
        return [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'number' => 'required|string|digits:10',
        'course' => 'required|string|max:255',
        'country' => 'nullable|string|max:255',
        'university' => 'nullable|string|max:255',
        'intake' => 'nullable|string|max:255',
        'qualification' => 'nullable|string|max:255',
        'academic_score' => 'nullable|string|max:255',
        'english_score' => 'nullable|string|max:255',
        'passed_year' => 'nullable|string|max:255',
        'event' => 'nullable|string',
        'event_location' => 'nullable|string|max:255',
        'event_date' => 'nullable|string|max:255',
        'event_time' => 'nullable|string|max:255',
        ];
    }
}
