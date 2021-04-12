<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRoleRequest extends FormRequest
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
        return [
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.exist' => 'Given User does not exist.',
            'role_id.exist' => 'Given Role does not exist.'
        ];
    }
}
