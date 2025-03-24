<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/create-user', [UserController::class,'create'])->name('users.create');
Route::post('/store-user', [UserController::class,'store'])->name('users.store');

Route::post('/select-cidade', [CidadeController::class,'selectCidade'])->name('cidades.select');