<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof \Illuminate\Database\QueryException) {
            if (str_contains($exception->getMessage(), 'corretores_cpf_unique')) {
                return response()->json(['message' => 'O CPF já está registrado.'], 422);
            }
            if (str_contains($exception->getMessage(), 'corretores_creci_unique')) {
                return response()->json(['message' => 'O CRECI já está registrado.'], 422);
            }

            return response()->json([
                'message' => 'Erro no banco de dados',
                'error' => $exception->getMessage(),
            ], 400);
        }

        return parent::render($request, $exception);
    }
}
