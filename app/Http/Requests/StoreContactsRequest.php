<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactsRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'number' => 'required|numeric',
            'recaptcha_token' => 'required|string',
            // Add any other fields and validation rules
        ];
    }
}
