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
    Route::get('group-creation','groupCreation')->name('groupCreation');
    Route::get('create-group','createGroup')->name('createGroup');
    Route::get('edit-group/{id}','editGroup')->name('editGroup');
    Route::get('view-group/{id}','viewGroup')->name('viewGroup');
    Route::get('customer-creation','customerCreation')->name('customerCreation');
    Route::get('payment-collection','paymentCollection')->name('paymentCollection');
    Route::get('payment-view/{id}','paymentView')->name('paymentView');
    Route::get('payment-approval','paymentApproval')->name('paymentApproval');
    Route::get('action-update','actionUpdate')->name('actionUpdate');
    Route::get('action-update/customer-list','actionUpdateCustomerList')->name('actionUpdateCustomerList');
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
        Route::get('/edit-user/{id}', 'editUser')->name('editUser');
        Route::get('/view-profile', 'viewProfile')->name('viewProfile');
        Route::get('/view-user/{id}', 'viewUser')->name('viewUser');
    });
});