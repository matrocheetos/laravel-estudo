<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        // $users = User::paginate(2); // 2 por página ?page=
        return response()->json([
            'status' => true,
            'user'=> $users,
        ],200);
    }
}
