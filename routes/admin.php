<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AnnouncementController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('attendances', AttendanceController::class);

    // Route untuk buat announcement saja
    Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
});
