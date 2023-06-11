<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $name = ['required', 'min:3', 'max:255'];
        $cpf = ['required', 'min:11', 'max:11', Rule::unique('users')];
        $email = ['required', 'min:3', 'max:255', 'email', Rule::unique('users')];
        $password = ['required', 'min:6', 'max:32'];
        $address = ['required', 'min:3', 'max:255'];
        $stateId = ['required', 'integer'];
        $cityId = ['required', 'integer'];
        $gender = ['required', 'string', 'min:1', 'max:1'];
        $birth = ['required', 'date'];

        if (FormRequest::isMethod('post')) {
            return [
                'name' => $name,
                'cpf' => $cpf,
                'gender' => $gender,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'state_id' => $stateId,
                'city_id' => $cityId,
                'birth' => $birth
            ];
        }

        if (FormRequest::isMethod('put')) {
            $password = ['nullable', 'min:6', 'max:32'];
            $cpf = ['required', 'min:11', 'max:11', Rule::unique('users')->ignore($this->id)];
            $email = ['required', 'min:3', 'max:255', 'email', Rule::unique('users')->ignore($this->id)];

            return [
                'name' => $name,
                'cpf' => $cpf,
                'gender' => $gender,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'state_id' => $stateId,
                'city_id' => $cityId,
                'birth' => $birth
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'name.min' => 'O campo "Nome" precisa de no mínimo 3 caracteres.',
            'name.max' => 'O campo "Nome" precisa de no máximo 255 caracteres.',
            'cpf.required' => 'O campo "CPF" é obrigatório.',
            'cpf.min' => 'O "CPF" digitado é inválido. Utilize apenas números.',
            'cpf.max' => 'O "CPF" digitado é inválido. Utilize apenas números.',
            'cpf.unique' => 'O CPF digitado já está sendo usado.',
            'birth.required' => 'O campo "Nascimento" é obrigatório.',
            'birth.date' => 'A data de "Nascimento" digitada é inválida.',
            'email.required' => 'O campo "Email" é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.min' => 'O campo "Email" precisa de no mínimo 3 caracteres.',
            'email.max' => 'O campo "Email" precisa de no máximo 255 caracteres.',
            'email.unique' => 'O email digitado já está sendo usado.',
            'password.required' => 'O campo "Senha" é obrigatório.',
            'password.min' => 'O campo "Senha" precisa de no mínimo 6 caracteres.',
            'password.max' => 'O campo "Senha" precisa de no máximo 32 caracteres.',
            'address.required' => 'O campo "Endereço" é obrigatório.',
            'address.min' => 'O campo "Endereço" precisa de no mínimo 3 caracteres.',
            'address.max' => 'O campo "Endereço" precisa de no máximo 255 caracteres.',
            'state_id.required' => 'O campo "Estado" é obrigatório.',
            'state_id.integer' => 'Selecione uma opção válida para "Estado".',
            'city_id.required' => 'O campo "Cidade" é obrigatório.',
            'city_id.integer' => 'Selecione uma opção válida para "Cidade".',
            'gender.required' => 'O campo "Sexo" é obrigatório.',
            'gender.min' => 'Selecione uma opção válida para "Sexo".',
            'gender.max' => 'Selecione uma opção válida para "Sexo".',
            'gender.string' => 'Selecione uma opção válida para "Sexo".'
        ];
    }
}
