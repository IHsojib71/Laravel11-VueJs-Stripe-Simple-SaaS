<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BmiCalculatorController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\PpiCalculatorController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('bmi/index', [BmiCalculatorController::class, 'index'])->name('bmi.index');
    Route::post('bmi/calculate', [BmiCalculatorController::class, 'calculate'])->name('bmi.calculate');
    Route::get('ppi/index', [PpiCalculatorController::class, 'index'])->name('ppi.index');
    Route::post('ppi/calculate', [PpiCalculatorController::class, 'calculate'])->name('ppi.calculate');

    Route::get('credit/index',[CreditController::class, 'index'])->name('credit.index');
    Route::post('credit/buy/{package}',[CreditController::class, 'buyCredits'])->name('credit.buy');
    Route::get('credit/success',[CreditController::class, 'success'])->name('credit.success');
    Route::get('credit/cancel',[CreditController::class, 'cancel'])->name('credit.cancel');
});
Route::get('credit/webhook', [CreditController::class, 'webhook'])->name('credit.webhook');
require __DIR__.'/auth.php';
