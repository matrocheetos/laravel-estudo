<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    // retorna todos usuarios
    public function index() : JsonResponse {
        $users = User::orderBy('id', 'DESC')->get(); // retorna todos usuarios em ordem decrescente
        // $users = User::orderBy('id', 'DESC')->paginate(2); // retorna 2 users por pagina em ordem decrescente, utilizar parametro ?page=1, ?page=2, ...
        return response()->json([
            'status' => true,
            // 'message' => "Listar usuarios",
            'users' => $users,
            ],200);

    }

    // retorna um usuario por id
    public function show(User $user): JsonResponse {
        return response()->json([
            'status'=> true,
            'user'=> $user
            ],200);
    }

    // cadastra novo usuario
    public function store(UserRequest $request) : JsonResponse {
        //dd($request);
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
            ]);

            DB::commit(); //sucesso
            return response()->json([
                'status'=> true,
                'user'=> $user,
                'message' =>'Usuário cadastrado com sucesso',
            ], 201);

        } catch (Exception $e) {
            // erro
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message'=> "Usuário não cadastrado",
                ],400);
        }

    }

    // edita usuario existente por id
    public function update(UserRequest $request, User $user) : JsonResponse {
        
        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email'=> $request->email, //problema no email? 59 min da videoaula 5
                'password'=> bcrypt($request->password),
            ]);

            DB::commit();

            return response()->json([
                "status"=> true,
                "user"=> $user,
                "message" => 'Usuário editado com sucesso',
            ],200);
        
        } catch (Exception $e) {
            // erro
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message'=> "Usuário não editado",
            ],400);
        }

    }

    // deleta usuario por id
    public function destroy(User $user) : JsonResponse {
        
        try{
            $user->delete();
            return response()->json([
                "status"=> true,
                "user"=> $user,
                "message" => 'Usuário deletado com sucesso',
            ],200);

        } catch (Exception $e) {
            //erro
            return response()->json([
                'status'=> false,
                'message'=> "Usuário não deletado",
            ],400);
        }
    }

}
