<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;

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

Route::prefix('/')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/profile', function () {
        return view('pages.frontend.profile');
    })->name('profile');
    Route::get('/government', function () {
        return view('pages.frontend.government');
    })->name('government');
    Route::get('/data-penduduk', function () {
        return view('pages.frontend.penduduk');
    })->name('data-penduduk');
});

Route::prefix('/complaints')->group(function () {
    Route::get('/track', [FrontendController::class, 'tracking'])->name('complaints.track');
    Route::get('/public', [FrontendController::class, 'publicComplaints'])->name('complaints.public');
    Route::get('/{complaint}/public', [FrontendController::class, 'show'])->name('complaints.show.public');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Complainant
    Route::middleware([
        'role:complainant'
    ])->name('complainant.')->group(function () {
        Route::resource('complaints', ComplaintController::class)->only([
            'index', 'create', 'store', 'show', 'destroy'
        ]);
        Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show')->middleware('checkAccessComplaint');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');

        Route::resource("documents", DocumentController::class)->only([
            'index', 'create', 'store', 'show', 'update', 'destroy'
        ]);
        Route::get('/documents/{document}/download', [DocumentController::class, 'generatePDFDetail'])->name('documents.generate-pdf-detail');
    });

    // Staff
    Route::middleware([
        'role:staff'
    ])->name('staff.')->prefix('staff')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/complaints', [AdminController::class, 'index'])->name('complaints.index');
        Route::put('/complaints/{complaint}/response', [ComplaintController::class, 'updateResponse'])->name('complaints.update-response');
        Route::put('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');
        Route::get('/report/generate-pdf', [ComplaintController::class, 'generatePDFAll'])->name('complaints.generate-pdf-all');
        Route::resource("complaints", ComplaintController::class)->only([
            'show', 'destroy'
        ]);

        Route::get('/documents', [AdminController::class, 'indexDocuments'])->name('documents.index');
        Route::put('/documents/{document}/response', [DocumentController::class, 'updateResponse'])->name('documents.update-response');
        Route::put('/documents/{document}/status', [DocumentController::class, 'updateStatus'])->name('documents.update-status');
        Route::get('/report/document/download', [DocumentController::class, 'generatePDFAll'])->name('documents.generate-pdf-all');
        Route::resource("documents", DocumentController::class)->only([
            'show', 'destroy'
        ]);

        Route::resource("users", UserController::class)->only([
            'index', 'show'
        ]);

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    });

    Route::middleware([
        'role:admin'
    ])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/complaints', [AdminController::class, 'index'])->name('complaints.index');
        Route::put('/complaints/{complaint}/response', [ComplaintController::class, 'updateResponse'])->name('complaints.update-response');
        Route::put('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');
        Route::get('/report/generate-pdf', [ComplaintController::class, 'generatePDFAll'])->name('complaints.generate-pdf-all');
        Route::resource("complaints", ComplaintController::class)->only([
            'show', 'destroy'
        ]);

        Route::get('/documents', [AdminController::class, 'indexDocuments'])->name('documents.index');
        Route::put('/documents/{document}/response', [DocumentController::class, 'updateResponse'])->name('documents.update-response');
        Route::put('/documents/{document}/status', [DocumentController::class, 'updateStatus'])->name('documents.update-status');
        Route::get('/report/document/download', [DocumentController::class, 'generatePDFAll'])->name('documents.generate-pdf-all');
        Route::resource("documents", DocumentController::class)->only([
            'show', 'destroy'
        ]);


        Route::get('/users/officer', [UserController::class, 'getStaffAndAdminData'])->name('users.get-officer');
        Route::resource("users", UserController::class)->only([
            'index', 'create', 'store', 'show', 'destroy'
        ]);

        Route::resource("categories", CategoryController::class)->only([
            'index', 'store', 'destroy'
        ]);
    });
});
