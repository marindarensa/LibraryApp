<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('book', BookController::class);
    Route::resource('student', StudentController::class);
    Route::resource('transaction', TransactionController::class);
    Route::post('/transaction/{id}/return', [TransactionController::class, 'return'])->name('transaction.return');

    Route::get('/report', [TransactionController::class, 'report'])->name('report');
    Route::get('/report-student', [StudentController::class, 'report'])->name('report-student');
});