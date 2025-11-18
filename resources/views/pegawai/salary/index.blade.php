@extends('pegawai')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Slip Gaji</h1>

    <!-- Alert Messages -->
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Info Pegawai -->
    <div class="bg-white p-4 border rounded-xl mb-6">
        <h2 class="text-lg font-semibold mb-2">Informasi Pegawai</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Nama</p>
                <p class="font-semibold">{{ $employee->nama_lengkap }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Departemen</p>
                <p class="font-semibold">{{ $employee->department?->nama_departemen ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Jabatan</p>
                <p class="font-semibold">{{ $employee->position?->nama_jabatan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Gaji Pokok</p>
                <p class="font-semibold">Rp
                    {{ $employee->position?->gaji_pokok ? number_format($employee->position->gaji_pokok, 0, ',', '.') : '-' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Riwayat Gaji -->
    <h2 class="text-xl font-semibold mb-3">Riwayat Slip Gaji</h2>

    <div class="bg-white border rounded-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="p-3 text-center">Bulan</th>
                    <th class="p-3 text-center">Gaji Pokok</th>
                    <th class="p-3 text-center">Tunjangan</th>
                    <th class="p-3 text-center">Potongan</th>
                    <th class="p-3 text-center">Total Gaji</th>
                </tr>
            </thead>

            <tbody>
                @forelse($salaries as $salary)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">
                        {{ $salary->bulan }}
                    </td>
                    <td class="p-3 border text-center">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border text-center text-green-600">
                        + Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border text-center text-red-600">
                        - Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border text-center font-bold ">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">
                        Belum ada data slip gaji
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
