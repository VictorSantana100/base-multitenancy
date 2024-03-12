<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return $this->isMethod('POST') ? $this->store() : $this->update();
    }

    public function store()
    {
        return [
            'name' => 'required|string|max:255|min:6',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    
    
    public function update()
    {
        return [
            'name' => 'required|unique:users,name,' . $this->user_id,
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'required|string|min:6|confirmed'
        ];
    }

}
