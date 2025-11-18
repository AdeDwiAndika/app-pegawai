<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_lengkap', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('nomor_telepon', 'like', "%{$search}%")
                            ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString(); // Mempertahankan parameter search saat pagination

        return view('admin.employee.index', compact('employees', 'search'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id',
            'status'        => 'required|string|max:50',
        ]);

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil disimpan!');
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.show', compact('employee', 'departments', 'positions'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id',
            'status'        => 'required|string|max:50',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
