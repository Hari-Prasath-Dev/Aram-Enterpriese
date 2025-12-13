<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComponentspageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AiapplicationController;
use App\Http\Controllers\ChartController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'signin')->name('signin');
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
    Route::get('faq','faq')->name('faq');
    Route::get('gallery','gallery')->name('gallery');
    Route::get('image-upload','imageUpload')->name('imageUpload');
    Route::get('kanban','kanban')->name('kanban');
    Route::get('page-error','pageError')->name('pageError');
    Route::get('pricing','pricing')->name('pricing');
    Route::get('starred','starred')->name('starred');
    Route::get('terms-condition','termsCondition')->name('termsCondition');
    Route::get('veiw-details','veiwDetails')->name('veiwDetails');
    Route::get('widgets','widgets')->name('widgets');

    });

    // aiApplication
Route::prefix('aiapplication')->group(function () {
    Route::controller(AiapplicationController::class)->group(function () {
        Route::get('/code-generator', 'codeGenerator')->name('codeGenerator');
        Route::get('/code-generatornew', 'codeGeneratorNew')->name('codeGeneratorNew');
        Route::get('/image-generator','imageGenerator')->name('imageGenerator');
        Route::get('/text-generator','textGenerator')->name('textGenerator');
        Route::get('/text-generatornew','textGeneratorNew')->name('textGeneratorNew');
        Route::get('/video-generator','videoGenerator')->name('videoGenerator');
        Route::get('/voice-generator','voiceGenerator')->name('voiceGenerator');
    });
});

// Authentication
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
        // Route::get('/sign-in', 'signin')->name('signin');
        Route::get('/sign-up', 'signup')->name('signup');
        Route::post('/admin-login', 'login')->name('login.check');

    });
});

// chart
Route::prefix('chart')->group(function () {
    Route::controller(ChartController::class)->group(function () {
        Route::get('/column-chart', 'columnChart')->name('columnChart');
        Route::get('/line-chart', 'lineChart')->name('lineChart');
        Route::get('/pie-chart', 'pieChart')->name('pieChart');
    });
});

// Componentpage
Route::prefix('componentspage')->group(function () {
    Route::controller(ComponentspageController::class)->group(function () {
        Route::get('/imageupload/{id}', 'imageUpload')->name('imageUpload');
         Route::post('/users/{userId}', 'storeBankDetails')->name('users.bank-details.store');
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
        Route::get('/form-validation/{id}/edit', 'formValidation')->name('formValidation');
        Route::put('users/{id}', 'update')->name('users.update');
        Route::post('/pin-update/{id}', 'updatePin')->name('user.pin.update');

    });
});

// Users
Route::prefix('users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/add-user', 'addUser')->name('addUser');
        Route::get('/edit-user/{id}', 'editUser')->name('editUser');
        Route::get('/view-profile', 'viewProfile')->name('viewProfile');
        Route::get('/view-user', 'viewUser')->name('viewUser');
        Route::post('/customers/store', 'store')->name('customers.store');
        Route::get('/view-user/{id}', 'viewUser')->name('viewUser');
    });
});