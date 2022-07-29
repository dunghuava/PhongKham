<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
                'guard_name' => 'required|min:5|unique:permissions,guard_name,'. $this->id
            ];
        }
        return [
            'name' => 'required',
            'guard_name' => 'required|min:5|unique:permissions,guard_name'
        ];
    }
}
