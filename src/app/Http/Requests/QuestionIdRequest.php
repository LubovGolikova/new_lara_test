<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionIdRequest extends FormRequest
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
            'id' => 'required|exists:questions,id'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'The id is Required.',
            'id.exist' => 'Given Question does not exist.'
        ];
    }
}
