<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Umum
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();

        // Statistik Absensi Hari Ini
        $today = Carbon::today();
        $attendanceToday = Attendance::whereDate('tanggal', $today)->get();

        //$hadirToday = $attendanceToday->where('status_absensi', 'hadir')->count();
        $izinToday = $attendanceToday->where('status_absensi', 'izin')->count();
        $sakitToday = $attendanceToday->where('status_absensi', 'sakit')->count();
        $alphaToday = $attendanceToday->where('status_absensi', 'alpha')->count();

        // Absensi Bulan Ini
        $attendanceThisMonth = Attendance::whereMonth('tanggal', Carbon::now()->month)
                                        ->whereYear('tanggal', Carbon::now()->year)
                                        ->count();

        // Pegawai Terbaru
        $recentEmployees = Employee::with(['department', 'position'])
                                   ->latest()
                                   ->take(5)
                                   ->get();

return view('admin.dashboard', [
    'totalEmployees'      => $totalEmployees ?? 0,
    'totalDepartments'    => $totalDepartments ?? 0,
    'totalPositions'      => $totalPositions ?? 0,
    'hadirToday'          => $hadirToday ?? 0,
    'izinToday'           => $izinToday ?? 0,
    'sakitToday'          => $sakitToday ?? 0,
    'alphaToday'          => $alphaToday ?? 0,
    'attendanceThisMonth' => $attendanceThisMonth ?? 0,
    'recentEmployees'     => $recentEmployees ?? collect(),
]);
    }
}
