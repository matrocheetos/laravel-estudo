<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// POST - http://127.0.0.1/api/login - { "email": "mateus@m.com", "password": "1234567" }
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [UserController::class,'index']);  // GET - http://127.0.0.1/api/users
    Route::post('/logout/{user}', [LoginController::class,'logout']); // POST - http://127.0.0.1/api/logout/1
});