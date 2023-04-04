<?php

use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/test',[TestController::class,'testing'])->name("user:test:post")->middleware([
        'testing'=>"can:edit articles",
//        'general'=>"can:publish articles"
    ]);

    Route::post('/test/general',[TestController::class,'general'])->name("user:test:post")->middleware([
        'testing'=>"can:publish articles",
//        'general'=>"can:publish articles"
    ]);

    Route::apiResource('/api_test',ApiTestController::class)
        ->except('create','show','update','destroy')
    ->middleware(['index'=>'can:edit articles',
                    'store'=>'can:publish articles',

        ]);

});
