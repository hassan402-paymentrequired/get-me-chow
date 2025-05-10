<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitorRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:225',
            'email' => 'nullable|email|unique:visitors,email|max:225',
            'phone' => ['required', 'regex:/^(\+234|0)[789]\d{9}$/'],
            'reason' => 'nullable|min:10|max:300',
            'employee_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Invalid phone number format',
            'user_id.required' => 'Please select who you are visiting',
            'email.unique' => 'Email already exists with a visitor ',
        ];
    }
}
