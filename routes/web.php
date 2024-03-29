<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/students', function (Request $request) {
    return view('students');
})->middleware(['auth'])->name('students');

Route::get('/schools', function (Request $request) {
    return view('schools');
})->middleware(['auth'])->name('schools');

Route::get('/audit-trails', function (Request $request) {
    return view('audit_trails',[
        // 'audit-trail' => []
    ]);
})->middleware(['auth'])->name('audit_trails');


require __DIR__.'/auth.php';

// Route::view('/{any}', 'dashboard')
// ->middleware('auth')
// ->where('any','.*');

Route::view('/schools/{any}', 'schools')
->middleware('auth')
->where('any','.*');

Route::view('/students/{any}', 'students')
->middleware('auth')
->where('any','.*');

// Route::view('//{any}', 'audit_trails')
// ->middleware('auth')
// ->where('any','.*');