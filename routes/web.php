<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\AgreementRequestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Models\AgreementRequest;
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
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/property', [HomeController::class, 'property'])->name('property');
Route::get('/property/{id}/show', [HomeController::class, 'propertyShow'])->name('property.show');
Route::post('/property/search', [HomeController::class, 'propertySearch'])->name('property.search');
//User Routes
Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->name('user.dashboard');
// Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->middleware(['auth', 'verified'])->name('user.dashboard');
// })->->name('dashboard');
Route::get('/userProfile/{id}', [ProfileController::class, 'viewUser'])->name('user.view');
Route::get('/userProfileJ/{id}', [ProfileController::class, 'viewUserJ'])->name('user.viewJson');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/myprofile', [ProfileController::class, 'home'])->name('profile.home');
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('userType:owner')->prefix('user')->name('user.')->group(function () {
    //Prpoperty Routes
    Route::get('property/{id}/delete', [PropertyController::class, 'destroy'])->name('property.destroy');
    Route::post('property/imageAdded', [PropertyController::class, 'imageStore'])->name('property.imageStore');
    Route::get('property/imageAdd/{id}', [PropertyController::class, 'imageAdd'])->name('property.imageAdd');
    Route::resource('property', PropertyController::class);
    //Agreement Routes
    Route::get('agreement/{id}/delete', [AgreementController::class, 'destroy'])->name('agreement.delete');
    Route::get('agreement/{id}/accept', [AgreementController::class, 'accept'])->name('agreement.accept');
    Route::get('agreement/{id}/reject', [AgreementController::class, 'reject'])->name('agreement.reject');
    Route::get('agreement/{id}/create', [AgreementController::class, 'create1'])->name('agreement.create1');
    Route::resource('agreement', AgreementController::class);
    //
    Route::get('agreement/{id}/makeAgreement/{email}', [AgreementController::class, 'makeAgreement'])->name('agreement.makeAgreement');

    //Agreement Reequest 

    Route::get('aRequest/{id}/accept', [AgreementRequestController::class, 'accept'])->name('aRequest.accept');
    Route::get('aRequest/{id}/reject', [AgreementRequestController::class, 'reject'])->name('aRequest.reject');
    Route::get('aRequest/{id}/show', [AgreementRequestController::class, 'showOwner'])->name('aRequest.show');
    Route::get('aRequest/', [AgreementRequestController::class, 'indexOwner'])->name('aRequest.indexOwner');
});
Route::middleware('userType:tenant')->prefix('user')->name('user.')->group(function () {
    //tenant Agreement Routes
    Route::put('agreements/storeAgreement', [AgreementController::class, 'storeAgreement'])->name('agreement.storeAgreement');
    Route::get('agreement/{id}/signAgreement', [AgreementController::class, 'signAgreement'])->name('agreement.signAgreement');
    Route::get('agreement/{id}/signAgreement', [AgreementController::class, 'signAgreement2'])->name('agreement.signAgreement2');
    Route::get('agreementshow/{id}', [AgreementController::class, 'showt'])->name('agreement.showt');

    Route::get('agreements/tenant', [AgreementController::class, 'tenant'])->name('agreement.tenant');
    Route::get('agreement/{id}/revoke', [AgreementController::class, 'revoke'])->name('agreement.revoke');

    // Agreement Request
    Route::get('agreementRequest/{id}/delete', [AgreementRequestController::class, 'destroy'])->name('agreement.request.delete');
    Route::get('agreementRequest/{id}/add', [AgreementRequestController::class, 'create'])->name('agreementRequest.create');
    Route::get('agreementRequest/{id}/show', [AgreementRequestController::class, 'show'])->name('agreementRequest.show');
    Route::get('agreementRequest/', [AgreementRequestController::class, 'index'])->name('agreementRequest.index');
    Route::post('agreementRequest/added', [AgreementRequestController::class, 'store'])->name('agreementRequest.store');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
