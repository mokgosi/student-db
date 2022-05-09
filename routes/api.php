<?php

use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AuditController;
use App\Http\Controllers\Api\ProvinceController;
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

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResource('students', StudentController::class);
    Route::apiResource('audit-trails', AuditController::class);
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('provinces', ProvinceController::class);

});
Route::get('/students-dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
Route::get('/schools-dashboard', [SchoolController::class, 'dashboard'])->name('schools.dashboard');
Route::get('/audit-trails-dashboard', [AuditController::class, 'dashboard'])->name('audits.dashboard');