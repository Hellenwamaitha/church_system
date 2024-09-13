<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChurchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'establisher_name' => 'required|string|max:255',
            'email' => 'required|email|unique:churches,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'established_date' => 'required|date',
            'branches.*.branch_name' => 'required|string|max:255',
            'branches.*.pastor_name' => 'required|string|max:255',
            'branches.*.pastor_email' => 'required|email|unique:branches,pastor_email',
        ];
        
    }
}
