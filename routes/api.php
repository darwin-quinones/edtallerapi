<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;

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
// });

// Route::apiResource('estudiantes', App\Http\Controllers\EstudiantesController::class);
Route::group(['prefix' => 'estudiantes'], function () {
    Route::get('index', [EstudiantesController::class, 'index']);
    Route::post('store', [EstudiantesController::class, 'store']);
    Route::get('buscar/{id}', [EstudiantesController::class, 'getById']);
    Route::post('update/{id}', [EstudiantesController::class, 'update']);
    Route::post('delete/{id}', [EstudiantesController::class, 'destroy']);
    // Route::get('ver/{buscar}', [EstSuministrocontroller::class, 'ver']);
    // Route::post('editar', [EstSuministrocontroller::class, 'actualizar']);
    // Route::post('registrar', [EstSuministrocontroller::class, 'register']);
    // Route::get('borrar/{id}', [EstSuministrocontroller::class, 'delete']);
});
