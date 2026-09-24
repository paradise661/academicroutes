<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgencyRequest extends FormRequest
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
        $agencyId = $this->route('agency'); // Assuming the route uses {agency} parameter

        return [
            'company_name' => 'required',
            'contact_name' => 'required',
            'phone_number'=>'required',
            'official_email'=>'required',
            'contact_email'=>'required',
            'mobile'=>'required',
            'registered_address'=>'required',
            'designation'=>'required'

        ];
    }
}
