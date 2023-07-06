<?php

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

//Login
Route::post('/login',[App\Http\Controllers\API\AuthController::class, 'login'])->name('login');

//Logout
Route::get('/logout',[App\Http\Controllers\API\AuthController::class, 'logout'])->name('logout')->middleware('auth:api');

//Visits
//index
Route::get('/visits',[App\Http\Controllers\API\VisitController::class, 'index'])->name('visits.index')->middleware('auth:api');
//store
Route::post('/visits',[App\Http\Controllers\API\VisitController::class, 'store'])->name('visits.store');
//show
Route::get('/visits/{visit}',[App\Http\Controllers\API\VisitController::class, 'show'])->name('visits.show');
//delete
Route::get('/visits/{visit}/delete',[App\Http\Controllers\API\VisitController::class, 'delete'])->name('visits.delete');


//Vehicles
//index
Route::get('/vehicles',[App\Http\Controllers\API\VehicleController::class, 'index'])->name('vehicles.index')->middleware('auth:api');
//store
Route::post('/vehicles',[App\Http\Controllers\API\VehicleController::class, 'store'])->name('vehicles.store');
//show
Route::get('/vehicles/{vehicle}',[App\Http\Controllers\API\VisitController::class, 'show'])->name('vehicles.show');
//delete
Route::get('/vehicles/{vehicle}/delete',[App\Http\Controllers\API\VisitController::class, 'delete'])->name('vehicles.delete');