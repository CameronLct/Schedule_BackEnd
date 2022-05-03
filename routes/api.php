<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\ReunionsController;
use App\Http\Controllers\HorairesController;

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

Route::get("reunions/employes/{id}", [ReunionsController::class, "getEmployesByReunions"]);
Route::resource("employes", EmployesController::class);
Route::resource("reunions", ReunionsController::class);
Route::resource("horaires", HorairesController::class);