<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('root');
Route::get('/property', [HomeController::class, 'property'])->name('property');
Route::get('/property/{id}/show', [HomeController::class, 'propertyShow'])->name('property.show');
Route::post('/property/search', [HomeController::class, 'propertySearch'])->name('property.search');
//User Routes
Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->name('user.dashboard');
// Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->middleware(['auth', 'verified'])->name('user.dashboard');
// })->->name('dashboard');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/myprofile', [ProfileController::class, 'home'])->name('profile.home');
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('userType:owner')->prefix('user')->name('user.')->group(function () {
    // Routes accessible only to users with 'user' type
    //Prpoperty Routes
    Route::get('property/{id}/delete', [PropertyController::class, 'destroy'])->name('property.destroy');
    Route::post('property/imageAdded', [PropertyController::class, 'imageStore'])->name('property.imageStore');
    Route::get('property/imageAdd/{id}', [PropertyController::class, 'imageAdd'])->name('property.imageAdd');
    Route::resource('property', PropertyController::class);
    //Agreement Routes
    Route::get('agreement/{id}/delete', [AgreementController::class, 'destroy'])->name('agreement.delete');
    Route::get('agreement/{id}/accept', [AgreementController::class, 'accept'])->name('agreement.accept');
    Route::get('agreement/{id}/create', [AgreementController::class, 'create1'])->name('agreement.create1');
    Route::resource('agreement', AgreementController::class);
});
Route::middleware('userType:tenant')->prefix('user')->name('user.')->group(function () {
    //tenant Agreement Routes
    Route::post('agreement/storeAgreement', [AgreementController::class, 'storeAgreement'])->name('agreement.storeAgreement');
    Route::get('agreement/{id}/signAgreement', [AgreementController::class, 'signAgreement'])->name('agreement.signAgreement');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
