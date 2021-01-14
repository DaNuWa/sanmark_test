<?php

use Illuminate\Support\Facades\Route;

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
    return view('insert');
})->name('records.insert');

Route::get('/radius', function () {
    return view('radius');
})->name('radius');

//Route for submitting informations
Route::post('/submit-records',[\App\Http\Controllers\RunnerController::class,'store'])->name('records.store');
Route::post('/submit-radius',[\App\Http\Controllers\RunnerController::class,'radius'])->name('radius.store');

Route::get('/reports',[\App\Http\Controllers\RunnerController::class,'report'])->name('records.report');
Route::get('/reports/ajax',[\App\Http\Controllers\RunnerController::class,'reportAjax'])->name('records.report.ajax');
