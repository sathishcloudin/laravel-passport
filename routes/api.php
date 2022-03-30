<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

Route::post('register', [categoryController::class, 'register']);
Route::post('login', [categoryController::class, 'login']);

// ithu postman la list panara ku model table add panni aprm controller add panni
Route::post('/categorylistall',[categoryController::class, 'secshow'])->middleware('auth:api');
Route::post('/categorylist/{id}/shows',[categoryController::class, 'catshow'])->middleware('auth:api');
Route::post('/allnewslist',[NewsController::class, 'newhow'])->middleware('auth:api');
Route::post('/newslistn/{id}/showm',[NewsController::class, 'listshow'])->middleware('auth:api');
