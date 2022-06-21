<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EpisodeController;

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
Route::resource('personajes',CharactersController::class);
Route::resource('episodios',EpisodeController::class);
Route::resource('usuarios',UserController::class);
Route::post('login', [UserController::class, 'verificarCredenciales'])->name('login');
Route::post('registro', [UserController::class, 'store'])->name('registro');
Route::post('recuperacion', [UserController::class, 'recuperarContra'])->name('recuperacion');
