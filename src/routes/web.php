<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

//index.blade.phpを開く
Route::get('/',[TodoController::class,'index']);
Route::post('/todos',[TodoController::class,'store']);
Route::patch('/todos/update',[TodoController::class,'update']);
Route::delete('/todos/delete',[TodoController::class,'destroy']);