<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;

use App\Http\Controllers\AuthController;

#Route Register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

#routes untuk authentication sanctum
Route::middleware('auth:sanctum')->group(function () {

#route untuk melihat seluruh data pasien
Route::get('/patients', [PatientController::class, 'index']);

#route untuk menginput data pasien
Route::post('/patients', [PatientController::class, 'store']);

#route untuk mengupdate data pasien berdasarkan id
Route::put('/patients/{id}', [PatientController::class, 'update']);

#route untuk menghapus data pasien id
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

#route untuk melihat seluruh data pasien yang berstatus positive
Route::get('/patients/positive', [PatientController::class, 'showPositive']);

#route untuk melihat seluruh data pasien yang berstatus recovered
Route::get('/patients/recovered', [PatientController::class, 'showRecovered']);

#route untuk melihat seluruh data pasien yang berstatus dead
Route::get('/patients/dead', [PatientController::class, 'showDead']);

#route untuk melihat data pasien berdasarkan id
Route::get('/patients/{id}', [PatientController::class, 'show']);
});
