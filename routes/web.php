<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComponentspageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\UsersController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('calendar-Main','calendarMain')->name('calendarMain');
    Route::get('chit-creation','chitCreation')->name('chitCreation');
    Route::get('create-chit','createChit')->name('createChit');
    Route::get('customer-creation','customerCreation')->name('customerCreation');
    Route::get('payment-collection','paymentCollection')->name('paymentCollection');
    Route::get('reports','reports')->name('reports');
});

// Componentpage
Route::prefix('componentspage')->group(function () {
    Route::controller(ComponentspageController::class)->group(function () {
        Route::get('/imageupload', 'imageUpload')->name('imageUpload');
    });
});

// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

// Forms
Route::prefix('forms')->group(function () {
    Route::controller(FormsController::class)->group(function () {
        Route::get('/form-validation', 'formValidation')->name('formValidation');
    });
});

// Users
Route::prefix('users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/add-user', 'addUser')->name('addUser');
        Route::get('/view-profile', 'viewProfile')->name('viewProfile');
        Route::get('/view-user', 'viewUser')->name('viewUser');
    });
});