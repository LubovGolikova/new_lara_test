<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleDeleteRequest extends FormRequest
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
            'eloquent' => 'required|string|in:user,question,answer',
            'id' => 'required|exists:users,id'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'eloquent.required' => 'The eloquent is Required.',
            'id.required' => 'The id  is Required.',
            'id.exist' => 'Given User does not exist.'
        ];
    }
}
