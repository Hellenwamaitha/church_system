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
            'branch_id.required' => 'The branch field is required.',
            'branch_id.exists' => 'The selected branch does not exist.',
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a number.',
            'contribution_type.required' => 'Please specify the type of contribution.',
            'date.required' => 'The date of contribution is required.',
            'date.date' => 'Please provide a valid date.',
        ];
    }
        
}

