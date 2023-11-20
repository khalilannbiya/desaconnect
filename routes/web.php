<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/complaints/track', [FrontendController::class, 'tracking'])->name('complaints.track');
Route::get('/complaints/public', [FrontendController::class, 'publicComplaints'])->name('complaints.public');
Route::get('/complaints/{complaint}/public', [FrontendController::class, 'show'])->name('complaints.show.public');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Complainant
    Route::middleware([
        'role:complainant'
    ])->name('complainant.')->group(function () {
        Route::resource('complaints', ComplaintController::class);
        Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show')->middleware('checkAccessComplaint');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');
    });

    // Staff
    Route::middleware([
        'role:staff'
    ])->name('staff.')->prefix('staff')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/complaints', [AdminController::class, 'index'])->name('complaints.index');
        Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::put('/complaints/{complaint}/response', [ComplaintController::class, 'updateResponse'])->name('complaints.update-response');
        Route::put('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');
        Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');
        Route::get('/report/generate-pdf', [ComplaintController::class, 'generatePDFAll'])->name('complaints.generate-pdf-all');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    });

    Route::middleware([
        'role:admin'
    ])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/complaints', [AdminController::class, 'index'])->name('complaints.index');
        Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
        Route::put('/complaints/{complaint}/response', [ComplaintController::class, 'updateResponse'])->name('complaints.update-response');
        Route::put('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');
        Route::get('/complaints/{complaint}/generate-pdf', [ComplaintController::class, 'generatePDFDetail'])->name('complaints.generate-pdf-detail');
        Route::get('/report/generate-pdf', [ComplaintController::class, 'generatePDFAll'])->name('complaints.generate-pdf-all');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/officer', [UserController::class, 'getStaffAndAdminData'])->name('users.get-officer');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories}', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
