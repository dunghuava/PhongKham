<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        if($this->id){
            return [
                'name' => 'required',
                'username' => 'required|min:3|unique:users,username,' . $this->id,
                'email' => 'email|unique:users,email,' .$this->id,
                'password' => 'nullable|min:6',
                'password_confirmation' => 'required_with:password|same:password'
            ];
        }
        return [
            'name' => 'required',
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
