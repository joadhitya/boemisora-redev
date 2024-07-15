<?php

use App\Http\Controllers\Admin\ContentManagement\BalePageController;
use App\Http\Controllers\Admin\ContentManagement\EcoparkPageController;
use App\Http\Controllers\Admin\ContentManagement\HomePageController;
use App\Http\Controllers\Admin\ContentManagement\OurStoryPageController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\MasterData\SocialMediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MasterData\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('general/log-record', GeneralController::class);
        Route::group(['prefix' => 'master-data'], function () {
            // General
            Route::resource('md-supplier', SupplierController::class);
            // CMS
            Route::resource('md-social-media', SocialMediaController::class);
        });
        Route::group(['prefix' => 'content-management'], function () {
            Route::resource('homepage', HomePageController::class);
            Route::resource('ourstorypage', OurStoryPageController::class);
            Route::resource('ecoparkpage', EcoparkPageController::class);
            Route::resource('balepage', BalePageController::class);
        });
    });
});

require __DIR__ . '/auth.php';
