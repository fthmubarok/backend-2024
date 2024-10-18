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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AnimalController;

Route::get('/animals', [AnimalController::class, 'index']);           // GET request
Route::post('/animals', [AnimalController::class, 'store']);          // POST request
Route::put('/animals/{id}', [AnimalController::class, 'update']);     // PUT request
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']); // DELETE request
