<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;

class SalaryPegawaiController extends Controller
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

        // Ambil data salary berdasarkan employee_id
        $salaries = Salary::where('karyawan_id', $employee->id)
                        ->orderBy('bulan', 'desc')
                        ->get();

        return view('pegawai.salary.index', compact('salaries', 'employee'));
    }
}
