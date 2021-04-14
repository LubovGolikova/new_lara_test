<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionSearchRequest extends FormRequest
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
            'search' => 'string|nullable|max:255',
            'order_by' => 'string|nullable|in:updated_at,created_at',
            'order_direction' => 'string|nullable|in:asc,desc',
            'has_answer' => 'boolean|nullable',
            'has_voted_answer' => 'boolean|nullable',
            'order_by_votes' => 'boolean|nullable'
        ];
    }

}
