<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/index', [\App\Http\Controllers\API\TodosController::class, 'index']);
Route::post('/add', [\App\Http\Controllers\API\TodosController::class, 'add']);
Route::post('/remove', [\App\Http\Controllers\API\TodosController::class, 'remove']);
Route::post('/remove-all', [\App\Http\Controllers\API\TodosController::class, 'removeAll']);
Route::post('/done-all', [\App\Http\Controllers\API\TodosController::class, 'doneAll']);
