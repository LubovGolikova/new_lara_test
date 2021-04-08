<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'body' => 'required|max:255',
            'question_id' => 'max:1000'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'body.required' => 'The answer is Required.',
            'body.max'=> 'The answer  should be Maximum of 255 Character'
        ];
    }
}
