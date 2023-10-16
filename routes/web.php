<?php

use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\DisbursementController;

Route::get('/', function () {
    return view('layouts.app');
})->name('home')->middleware(['auth', 'verified', 'auth.redirect']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'auth.redirect'])->name('dashboard');

Route::middleware(['auth', 'auth.redirect'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['authservice', 'auth.redirect'])->group(function () {
    Route::resource('payment-methods', PaymentMethodController::class)->except(['destroy']);
    Route::post('payment-methods', [PaymentMethodController::class, 'updateNew'])->name('update-pm');
    Route::get('payment-method/edit', [PaymentMethodController::class, 'editNew'])->name('update-pm-view');
    Route::resource('permissions', PermissionController::class)->except(['destroy']);
    Route::resource('roles', RoleController::class)->except(['destroy']);
    Route::resource('users', UserController::class)->except(['destroy']);
    Route::get('/disbursement', [DisbursementController::class, 'index'])->name('disbursement');
    Route::get('/disbursement/edit', [DisbursementController::class, 'update'])->name('update-disb');
    Route::post('/disbursement/edit', [DisbursementController::class, 'updatePost'])->name('update-disb-post');
    Route::get('/disbursement/hist/{id}', [DisbursementController::class, 'disbHist'])->name('disb-hist');
    Route::get('/testing', [TestingController::class, 'index'])->middleware('env.check')->name('testing');
    Route::post('/testing', [TestingController::class, 'send'])->middleware('env.check')->name('testing');
});

require __DIR__ . '/auth.php';
