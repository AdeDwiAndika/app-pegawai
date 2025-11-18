<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendancePegawaiController extends Controller
{
    public function index()
    {
        // Ambil employee berdasarkan user yang login
        $user = Auth::user();
        $employee = $user->employee;

        // Cek jika employee tidak ditemukan
        if (!$employee) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Ambil data absensi berdasarkan employee_id
        $attendances = Attendance::where('karyawan_id', $employee->id)
                        ->orderBy('tanggal', 'desc')
                        ->get();

        // Cek absensi hari ini
        $today = Carbon::today()->format('Y-m-d');
        $attendanceToday = Attendance::where('karyawan_id', $employee->id)
                            ->where('tanggal', $today)
                            ->first();

        return view('pegawai.attendance.index', compact('attendances', 'attendanceToday', 'today'));
    }

    public function checkIn()
    {
        $user = Auth::user();
        $employee = $user->employee;

        if (!$employee) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $today = Carbon::today()->format('Y-m-d');

        // Cek apakah sudah absen hari ini
        $absen = Attendance::where('karyawan_id', $employee->id)
                    ->where('tanggal', $today)
                    ->first();

        if ($absen) {
            return back()->with('error', 'Anda sudah melakukan check-in hari ini.');
        }

        // Buat absensi baru
        Attendance::create([
            'karyawan_id' => $employee->id,
            'tanggal' => $today,
            'waktu_masuk' => Carbon::now()->format('H:i:s'),
            'status_absensi' => 'hadir'
        ]);

        return back()->with('success', 'Check-in berhasil!');
    }

    public function checkOut()
    {
        $user = Auth::user();
        $employee = $user->employee;

        if (!$employee) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $today = Carbon::today()->format('Y-m-d');

        // Cek absensi hari ini
        $absen = Attendance::where('karyawan_id', $employee->id)
                    ->where('tanggal', $today)
                    ->first();

        if (!$absen) {
            return back()->with('error', 'Anda belum melakukan check-in.');
        }

        if ($absen->waktu_keluar) {
            return back()->with('error', 'Anda sudah melakukan check-out hari ini.');
        }

        // Update waktu keluar
        $absen->update([
            'waktu_keluar' => Carbon::now()->format('H:i:s')
        ]);

        return back()->with('success', 'Check-out berhasil!');
    }
}
