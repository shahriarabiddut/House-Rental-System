<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PropertyController;

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
    //Prpoperty Routes
    Route::get('property/{id}/delete', [PropertyController::class, 'destroy'])->name('property.destroy');
    Route::post('property/imageAdded', [PropertyController::class, 'imageStore'])->name('property.imageStore');
    Route::get('property/imageAdd/{id}', [PropertyController::class, 'imageAdd'])->name('property.imageAdd');
    Route::resource('property', PropertyController::class);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
