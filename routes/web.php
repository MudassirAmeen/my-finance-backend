<?php

use App\Http\Controllers\documentation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/documentation/auth_api', [documentation::class, 'indexAuth'])->name('indexAuth');
Route::get('/documentation/income_api', [documentation::class, 'indexIncome'])->name('indexIncome');
Route::get('/documentation/expense_api', [documentation::class, 'indexExpense'])->name('indexExpense');