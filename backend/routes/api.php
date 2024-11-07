<?php

use App\Http\Controllers\admin\CheckLogController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('user')->group(function (){
    Route::get('/', [UserController::class,'index']);
    Route::post('/store',[UserController::class,'store']);
    Route::get('/show/{id}',[UserController::class,'show']);
    Route::put('/update/{id}',[UserController::class,'update']);
    Route::delete('/delete/{id}',[UserController::class,'destroy']);
});
Route::prefix('checklog')->group(function (){
    Route::get('/',[CheckLogController::class,'index']);
});
Route::prefix('/project')->group(function (){
    Route::get('/',[ProjectController::class,'index']);
    Route::post('/store',[ProjectController::class,'store']);
    Route::get('/show/{id}',[ProjectController::class,'show']);
    Route::put('/update/{id}',[ProjectController::class,'update']);
    Route::delete('/delete/{id}',[ProjectController::class,'destroy']);
});