<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pegawai\PegawaiDashboardController;
use App\Http\Controllers\Pegawai\ProfilePegawaiController;
use App\Http\Controllers\Pegawai\AttendancePegawaiController;
use App\Http\Controllers\Pegawai\SalaryPegawaiController;

Route::middleware(['auth', 'pegawai'])->group(function () {

    Route::get('/pegawai/dashboard', [PegawaiDashboardController::class, 'index'])
        ->name('pegawai.dashboard');

    Route::get('/pegawai/profile', [ProfilePegawaiController::class, 'index'])
        ->name('pegawai.profile');

    Route::patch('/pegawai/profile', [ProfilePegawaiController::class, 'update'])
        ->name('pegawai.profile.update');

    // Attendance Routes
    Route::get('/pegawai/attendance', [AttendancePegawaiController::class, 'index'])
        ->name('pegawai.attendance');

    Route::post('/pegawai/attendance/checkin', [AttendancePegawaiController::class, 'checkIn'])
        ->name('employee.attendance.checkin');

    Route::post('/pegawai/attendance/checkout', [AttendancePegawaiController::class, 'checkOut'])
        ->name('employee.attendance.checkout');

    Route::get('/pegawai/salary', [SalaryPegawaiController::class, 'index'])
        ->name('pegawai.salary');

});
