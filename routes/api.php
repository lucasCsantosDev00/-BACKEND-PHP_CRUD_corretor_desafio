<?php

use App\Http\Controllers\CorretorController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return 'API está funcionando';
});

Route::get('/corretores', [CorretorController::class, 'index']);
Route::post('/corretores', [CorretorController::class, 'store']);
Route::put('/corretores/{id}', [CorretorController::class, 'update']);
Route::delete('/corretores/{id}', [CorretorController::class, 'destroy']);
