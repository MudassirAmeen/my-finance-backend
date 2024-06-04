<?php

use App\Http\Controllers\income;
use App\Http\Controllers\expense;
use App\Http\Controllers\user;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureTokenIsValid::class)->group(function () {  
    Route::post('/income', [income::class, 'index']);
    Route::post('/store/income', [income::class, 'store']);
    Route::post('/expense', [expense::class, 'index']);
    Route::post('/store/expense', [expense::class, 'store']);
});

Route::post('/register', [user::class, 'register']);
Route::post('/login', [user::class, 'login']);