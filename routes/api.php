<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->group(function(){
    Route::get('/test', [TestController::class, 'index']);
    Route::get('/subject', [SubjectController::class, 'index']);
    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/question', [QuestionController::class, 'index']);
});
