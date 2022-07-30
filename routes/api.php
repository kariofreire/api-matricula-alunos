<?php

use App\Http\Controllers\Api\v1\ApiAlunosController;
use App\Http\Controllers\Api\v1\ApiCursosController;
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

Route::get("cursos", [ApiCursosController::class, "index"])->name("cursos.index");

Route::resource("alunos", ApiAlunosController::class);

Route::fallback(function () {
    return response()->json([
        "status"  => false,
        "message" => env("APP_NAME"),
        "data"    => "Página não encontrada."
    ], 404);
});
