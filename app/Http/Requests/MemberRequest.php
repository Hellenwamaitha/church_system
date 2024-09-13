<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
{
    $memberId = $this->route('member') ? $this->route('member')->id : null;

    return [
        'branch_id' => 'required|exists:branches,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:members,email,' . $memberId,
        'phone_number' => 'required|string|max:20',
        'address' => 'nullable|string|max:255',
        'membership_status' => 'required|string|max:255',
        'joined_date' => 'required|date',
        'category' => 'required|in:ladies,men,youths',
    ];
}

}

