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

Route::get('/', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');
Route::post('/attendance/print', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/print/{id}', [App\Http\Controllers\AttendanceController::class, 'print'])->name('attendance.print');
