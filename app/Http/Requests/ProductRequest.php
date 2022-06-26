<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $rules = ['required','min:2'];
        if($this->id){
            $rules[] = Rule::unique('products','id')->ignore($this->id);
        }else{
            $rules[] = 'unique:products,code';
        }
        return [
            'code' => $rules,
            'name' => 'required'
        ];
    }
}
