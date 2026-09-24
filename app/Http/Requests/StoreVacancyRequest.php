<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'number' => 'required|string|max:20',
        'link' => 'nullable|url',
        'file' => 'required|file|mimes:pdf,doc,docx',
        'message' => 'required|string',
    ];
}
}
