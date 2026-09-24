<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'email' => 'required|email',
        ];
    }
}
