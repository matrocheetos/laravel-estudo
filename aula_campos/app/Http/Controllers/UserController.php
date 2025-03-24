<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Estado;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::get();
        return view("users.index", ['users' => $users]);
    }

    public function create() {

        $estado = Estado::orderBy('nome_estado','asc')->get();
        
        return view('users.create', ['estados' => $estado]);
    }

    public function store(UserRequest $request) {
        $request->validated();

        DB::beginTransaction();
        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'cidade_id' => $request->cidade_id,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');

        } catch (Exception $e) {
            // dd($e->getMessage());
            DB::rollBack();
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }
}
