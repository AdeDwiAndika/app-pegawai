<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Announcement;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PegawaiDashboardController extends Controller
{
    public function index()
    {
        // Ambil employee berdasarkan user yang login
        $user = Auth::user();
        $employee = $user->employee;

        // Cek jika employee tidak ditemukan
        if (!$employee) {
            return redirect()->route('login')->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Hitung statistik absensi
        $totalHadir = Attendance::where('karyawan_id', $employee->id)
                        ->where('status_absensi', 'hadir')
                        ->count();

        $totalAlpha = Attendance::where('karyawan_id', $employee->id)
                        ->where('status_absensi', 'alpha')
                        ->count();

        $totalIzin = Attendance::where('karyawan_id', $employee->id)
                        ->where('status_absensi', 'izin')
                        ->count();

        $totalSakit = Attendance::where('karyawan_id', $employee->id)
                        ->where('status_absensi', 'sakit')
                        ->count();

        // Absensi bulan ini
        $absenBulanIni = Attendance::where('karyawan_id', $employee->id)
                        ->whereMonth('tanggal', Carbon::now()->month)
                        ->whereYear('tanggal', Carbon::now()->year)
                        ->count();

        // Absensi hari ini
        $absenHariIni = Attendance::where('karyawan_id', $employee->id)
                        ->whereDate('tanggal', Carbon::today())
                        ->first();

        // Pengumuman terbaru yang belum expired
        $pengumuman = Announcement::where(function($query) {
                            $query->whereNull('expires_at')
                                  ->orWhere('expires_at', '>=', Carbon::now());
                        })
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        // Slip gaji terakhir
        $gajiTerakhir = Salary::where('karyawan_id', $employee->id)
                        ->orderBy('bulan', 'desc')
                        ->first();

        return view('pegawai.dashboard', compact(
            'employee',
            'totalHadir',
            'totalAlpha',
            'totalIzin',
            'totalSakit',
            'absenBulanIni',
            'absenHariIni',
            'pengumuman',
            'gajiTerakhir'
        ));
    }
}
