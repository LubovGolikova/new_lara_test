<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UserRequest extends FormRequest
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
            'username' => 'required|min:2|max:255',
            'avatar_path' => 'mimes:jpeg,bmp,png',
            'email' => 'required|string|email|max:100|unique:users',
            'password'=>'required|string|confirmed|min:8'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'The username is Required.',
            'username.min'=> 'The username  should be Minimum of 2 Character',
            'username.max'=> 'The username  should be Maximum of 255 Character',
            'email.required' => 'The email is Required',
            'email.unique'    => 'The email is already used',
            'password.required'  => 'The password is Required.'
        ];
    }
}
