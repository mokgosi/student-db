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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/students', function (Request $request) {
    return view('students');
})->middleware(['auth'])->name('students');

Route::get('/schools', function (Request $request) {
    return view('schools');
})->middleware(['auth'])->name('schools');

Route::get('/audit-trail', function (Request $request) {
    return view('audit_trail',[
        // 'audit-trail' => []
    ]);
})->middleware(['auth'])->name('audit_trail');


require __DIR__.'/auth.php';

Route::view('/{any}', 'dashboard')
->middleware('auth')
->where('any','.*');

Route::view('/{any}', 'schools')
->middleware('auth')
->where('any','.*');

Route::view('/{any}', 'students')
->middleware('auth')
->where('any','.*');

Route::view('/{any}', 'audit-trails')
->middleware('auth')
->where('any','.*');