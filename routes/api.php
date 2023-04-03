<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login',[UserController::class,'login'])->name("user:post:login");
Route::post('/register',[UserController::class,'register'])->name("user:post:register");

Route::middleware('auth:admin')->group(function(){
    Route::post('/test',[TestController::class,'testing'])->name("user:test:post");
});
