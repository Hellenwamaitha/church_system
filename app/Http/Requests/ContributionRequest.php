<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributionRequest extends FormRequest
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
            
                'branch_id' => 'required|exists:branches,id',
                'amount' => 'required|numeric|min:0',
                'contribution_type' => 'required|string|max:255',
                'date' => 'required|date',
                'purpose' => 'nullable|string|max:255',
            

        ];
    }
}
