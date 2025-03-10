<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorretorRequest;
use App\Http\Requests\UpdateCorretorRequest;
use App\Models\Corretor;

class CorretorController extends Controller
{
    public function index()
    {
        $corretores = Corretor::all();
        return response()->json($corretores);
    }

    public function store(StoreCorretorRequest $request)
    {
        $validated = $request->validated();

        $cpfExists = Corretor::where('cpf', $validated['cpf'])->exists();
        if ($cpfExists) {
            return response()->json(['message' => 'O CPF já está registrado.'], 400);
        }

        try {
            $corretor = Corretor::create($validated);
            return response()->json($corretor, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar corretor'], 400);
        }
    }



    public function update(UpdateCorretorRequest $request, $id)
    {
        $corretor = Corretor::find($id);

        if (!$corretor) {
            return response()->json(['error' => 'Corretor não encontrado'], 404);
        }

        $validated = $request->validated();


        $updatedData = [];

        foreach ($validated as $key => $value) {
            if ($corretor->$key !== $value) {
                $updatedData[$key] = $value;
            }
        }

        if (!empty($updatedData)) {
            try {
                $corretor->update($updatedData);
                return response()->json($corretor, 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Erro ao atualizar corretor'], 400);
            }
        } else {
            return response()->json(['message' => 'Nenhuma alteração detectada'], 200);
        }
    }



    public function destroy($id)
    {
        $corretor = Corretor::find($id);

        if (!$corretor) {
            return response()->json(['error' => 'Corretor não encontrado'], 404);
        }

        $corretor->delete();

        return response()->json(['message' => 'Corretor deletado com sucesso'], 200);
    }
}
