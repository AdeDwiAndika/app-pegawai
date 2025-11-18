<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Redirect root → login
Route::get('/', function () {
    return redirect()->route('login');
});

// Semua route yang butuh login
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('pegawai.dashboard');
})->name('dashboard');

    // Route khusus admin
    require __DIR__.'/admin.php';

    // Route khusus pegawai
    require __DIR__.'/pegawai.php';
});

// Route auth dari Breeze
require __DIR__.'/auth.php';