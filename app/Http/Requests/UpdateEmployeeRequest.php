<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'job_position' => ['required', 'string'],
            'date_of_birth' => ['sometimes', 'string'], //sometimes
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'ktp_number' => ['required', 'string'],
            'ktp_image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'], //sometimes
            'bank_account' => ['required', 'string'],
            'bank_account_number' => ['required', 'string'],
        ];
    }
}
