<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCorretorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|min:2|max:255',
            'cpf' => 'sometimes|required|digits:11',
            'creci' => 'sometimes|required|string|min:2|max:20',
        ];
    }

    public function messages()
    {
        return [
            'creci.unique' => 'O CRECI já está registrado.',
        ];
    }
}
