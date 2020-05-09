<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserEditRequest extends FormRequest
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
        $id = $_POST['id'];
        return [
            'name' => 'required|min:3|max:30|string',
            'idnp' => [
                'required',
                'digits:13',
                Rule::unique('users')->ignore($id),
            ],
            'birth_date' => 'required|date',
            'enrolment_date' => 'required|date',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'nullable|string|min:8|max:20|confirmed',
        ];
    }

    /**
     * Get the validation messages in case of error.
     *
     * @return array|string[]
     */
    public function messages()
    {
        return[
            'name.required' => 'Numele este obligatoriu',
            'name.min' => 'Numele trebuie să conțină minim 3 caractere',
            'name.max' => 'Numele trebuie să conțină maxim 30 de caractere',
            'email.unique' => 'Utilizator cu așa email deja există',
            'password.min' => 'Parola trebuie să conțină minim 8 caractere',
            'password.max' => 'Parola trebuie să conțină maxim 20 caractere',
            'password.confirmed' => 'Parolele nu coincid',
        ];
    }
}
