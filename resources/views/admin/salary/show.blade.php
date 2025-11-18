@extends('admin')
@section('title', 'Detail Salary')
@section('page-title', 'Detail Gaji')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6 mb-6">
        <div class="justify-between flex items-center mb-3">
            <h1>Detail Gaji Karyawan</h1>
            <div class="flex gap-3">
                <a href="{{ route('salaries.index') }}"
                    class="h-min px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <a href="{{ route('salaries.edit', $salary->id) }}"
                    class="h-min px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-green-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-pen"></i>
                    <span>Edit</span>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl border border-gray-900">
            <table class="min-w-full text-sm text-left text-gray-700">
                <tbody>
                    <tr class="border border-white/10 ">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">
                            ID
                            Gaji
                        </th>
                        <td class="px-6 py-3 text-white">{{ $salary->id }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">Nama Karyawan</th>
                        <td class="px-6 py-3 text-white">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">Bulan</th>
                        <td class="px-6 py-3 text-white">{{ $salary->bulan }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">Gaji Pokok</th>
                        <td class="px-6 py-3 text-white">Rp{{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">Tunjangan</th>
                        <td class="px-6 py-3 text-white">Rp{{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">Potongan</th>
                        <td class="px-6 py-3 text-white">Rp{{ number_format($salary->potongan, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="border border-white/10">
                        <th class="bg-gray-800/50 border border-white/10 text-white text-center">
                            Total
                            Gaji</th>
                        <td class="px-6 py-3 font-semibold text-blue-600">
                            Rp{{ number_format($salary->total_gaji, 2, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
