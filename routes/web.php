<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('auth.login'));

Route::middleware(['auth', 'company.context'])->group(function (): void {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
