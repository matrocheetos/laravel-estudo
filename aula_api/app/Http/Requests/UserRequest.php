<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


     // valida os dados
     protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),

        ],422)); // entendeu requisição, mas não pode processar devido a erro de validação
     }

     // retorna as regras de validação para os dados
    public function rules(): array
    {
        //recuperar o id do usuario enviado na URL
        $userId = $this->route('users');

        return [
            "name"=> "required",
            "email"=> "required|email|unique:users,email" . ($userId ? $userId->id : null),
            "password"=> "required|min:7"
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Campo nome é obrigatório',
            'email.required' => 'Campo e-mail é obrigatório',
            'email.email' => 'E-mail deve ser válido',
            'email.unique' => 'Campo e-mail deve ser único',
            'password.required' => 'Campo senha é obrigatório',
            'password.min' => 'Senha com no mínimo :min caracteres',
        ];
    }
}
