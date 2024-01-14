<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffDepartmentController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AgreementController;

//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    // Settings Crud
    Route::get('settings/', [HomeController::class, 'editSetting'])->name('settings.edit');
    Route::put('settings/update/{id}', [HomeController::class, 'updateSetting'])->name('settings.update');
    //Profile
    Route::get('/profile', [HomeController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');

    // User Routes
    Route::get('user/{id}/delete', [UserController::class, 'destroy']);
    Route::resource('user', UserController::class);
    // Property Routes
    Route::get('property/agreement', [PropertyController::class, 'agreement'])->name('agreement.index');
    Route::get('property/agreement/{id}', [AgreementController::class, 'show'])->name('agreement.show');
    Route::get('property/booking', [PropertyController::class, 'booking'])->name('booking.index');
    Route::get('property/booking/{id}', [PropertyController::class, 'bookingshow'])->name('booking.show');
    Route::get('property/payment', [PropertyController::class, 'payment'])->name('payment.index');
    Route::get('property/payment/{id}', [PropertyController::class, 'paymentShow'])->name('payment.show');
    Route::resource('property', PropertyController::class);

    //Revoke Agreement
    Route::get('agreement/{id}/revoke', [HomeController::class, 'revoke'])->name('agreement.revoke');
});
