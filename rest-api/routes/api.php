<?php

use App\Http\Controllers\AnimalController;
# mengimport controller Student
use App\Http\Controllers\StudentController;
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

# Route animals
Route::get('/animals', [AnimalController::class, 'index']);
Route::post('/animals', [AnimalController::class, 'store']);
Route::put('/animals/{id}', [AnimalController::class, 'update']);
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

# Method GET
Route::get('/students', [StudentController::class, 'index']);

// Method SHOW
Route::get("/students/{id}", [StudentController::class, 'show']);

# Method POST
Route::post('/students', [StudentController::class, 'store']);

# Method PUT
Route::put('/students/{id}', [StudentController::class, 'update']);

# Method DELETE
Route::delete('/students/{id}', [StudentController::class, 'destroy']);