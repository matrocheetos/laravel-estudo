<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // validar email e senha
    public function login(Request $request): JsonResponse {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            
            $user = Auth::user();

            $token = $request->user()->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'token'=> $token,
                'user' => $user,
            ],201);
        }else{
            return response()->json([
                'status' => false,
                'message'=> 'Login ou senha incorreta',
            ],404);
        }
    }

    // logout
    // problema: por ex., um token gerado para um usuário 4 pode ser utilizado para deslogar o usuario 1 (localhost:8000/api/logout/1)
    public function logout(User $user): JsonResponse {
        try {

            $user->tokens()->delete();  

            return response()->json([
                'status' => true,
                'message'=> 'Deslogado com sucesso',
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message'=> 'Não foi possível deslogar',
            ],400);
        }
    }
}
