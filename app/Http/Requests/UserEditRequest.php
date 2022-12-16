<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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

    function attributes() {
        return [
            'name' => 'User name',
            'email' => 'User email'
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:80|min:2',
            'email' => 'required|email|unique:users,email,' . $this->user->id
        ];
    }
    
    function messages() {
        $required = 'Field :attribute required';
        $string = 'Field :attribute is a string';
        $max = 'Max length of :attribute is :max';
        $min = 'Min length of :attribute is :min';
        
        return [
            'name.required' => $required,
            'name.string' => $string,
            'name.max' => $max,
            'name.min' => $min,
            
            'email.required' => $required,
            'email.email' => 'Field :attribute is an email',
            'email.unique' => ':attribute already exists'
        ];
    }
}
