<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePegawaiController extends Controller
{
    public function index()
    {
        // Ambil user yang login
        $user = Auth::user();

        // Ambil data employee berdasarkan email dengan relasi
        $employee = $user->employee()->with(['department', 'position'])->first();

        // Cek jika employee tidak ditemukan
        if (!$employee) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        return view('pegawai.profile', compact('employee'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $employee = $user->employee;

        if (!$employee) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        // Update data employee
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'alamat',
            'tanggal_lahir'
        ]));

        // Update email di table users juga (opsional)
        if ($request->email != $user->email) {
            $user->update(['email' => $request->email]);
        }

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
