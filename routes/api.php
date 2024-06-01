<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('empleado', EmpleadoController::class)->missing([EmpleadoController::class, 'missing']);

Route::post('login',[AuthController::class, 'login']);
//Route::get('productos/{producto}/imagen', [ProductoController::class, 'showImage']);


Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('logout',[AuthController::class, 'logout']);
    Route::get('productos', [ProductoController::class, 'index']);
});