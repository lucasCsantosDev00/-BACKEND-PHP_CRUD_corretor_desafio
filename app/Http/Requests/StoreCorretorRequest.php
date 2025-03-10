<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorretorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'cpf' => 'required|digits:11|unique:corretores,cpf',
            'creci' => 'required|string|min:2|max:20',
        ];
    }

    public function messages()
    {
        return [
            'cpf.unique' => 'O CPF já está registrado.',
            'creci.unique' => 'O CRECI já está registrado.',
        ];
    }
}
