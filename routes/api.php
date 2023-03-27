<?php

use App\Http\Controllers\admin\AlunosController;
use App\Http\Controllers\admin\CargosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('alunos', AlunosController::class); // api para controle de alunos
Route::resource('cargos', CargosController::class); // api para visualização de cargos