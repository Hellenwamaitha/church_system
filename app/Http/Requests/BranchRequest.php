<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BranchRequest extends FormRequest
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
            'church_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'Location' => 'required|string|max:15',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:churches,email,' . $this->branch,
            'branch_manager' => 'required|string|max:255',
        ];
}
