<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|unique:users,phone_number,' . $user->id,
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'El campo nombre es obligatorio.',
            'first_name.string' => 'El campo nombre debe ser una cadena de caracteres.',

            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de caracteres.',

            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',

            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'phone_number.string' => 'El campo número de teléfono debe ser una cadena de caracteres.',
            'phone_number.unique' => 'Ya existe un usuario registrado con este número de teléfono.',
        ];
    }
}