<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit the form
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|numeric',
        ];
    }
}
