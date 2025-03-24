<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => "Usuário",
        ],200);
    // return $request->user(); // cod original exemplo
});
// })->middleware('auth:sanctum'); // verificar se usuario esta autenticado

// listar usuarios
Route::get('/users', [UserController::class, 'index']); // GET - http://127.0.0.1:8000/api/users

// visualizar
Route::get('/users/{user}', [UserController::class, 'show']); // GET - http://127.0.0.1:8000/api/users/1

// cadastrar
Route::post('/users', [UserController::class, 'store']); // POST - http://127.0.0.1:8000/api/users

// editar
Route::put('/users/{user}', [UserController::class, 'update']); // PUT - http://127.0.0.1:8000/api/users/1

// deletar
Route::delete('/users/{user}', [UserController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/users/1