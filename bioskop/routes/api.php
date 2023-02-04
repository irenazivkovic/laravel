<?php

use App\Http\Controllers\AutController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KlijentController;
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

Route::post('registracija', [AutController::class, 'register']);
Route::post('prijava', [AutController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('film', [FilmController::class, 'store']);
    Route::delete('film/{film}', [FilmController::class, 'destroy']);
    Route::post('odjava', [AutController::class, 'logout']);
});

Route::get('film', [FilmController::class, 'index']);
Route::get('film/{film}', [FilmController::class, 'show']);
Route::post('film', [FilmController::class, 'store']);
Route::delete('film/{film}', [FilmController::class, 'destroy']);
Route::get('klijent', [KlijentController::class, 'index']);
Route::get('klijent/{klijent}', [KlijentController::class, 'show']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
