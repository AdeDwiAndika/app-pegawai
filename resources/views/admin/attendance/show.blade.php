@extends('admin')
@section('title', 'Detail Absensi')
@section('page-title', 'Detail Absensi')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="justify-between flex">
        <div class="mb-6">
            @if($attendance->status_absensi == 'hadir')
            <span
                class="px-4 py-2 rounded-full text-sm font-semibold bg-green-500/20 text-green-400 border border-green-500/50 inline-flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                Hadir
            </span>
            @elseif($attendance->status_absensi == 'izin')
            <span
                class="px-4 py-2 rounded-full text-sm font-semibold bg-blue-500/20 text-blue-400 border border-blue-500/50 inline-flex items-center gap-2">
                <i class="fas fa-info-circle"></i>
                Izin
            </span>
            @elseif($attendance->status_absensi == 'sakit')
            <span
                class="px-4 py-2 rounded-full text-sm font-semibold bg-yellow-500/20 text-yellow-400 border border-yellow-500/50 inline-flex items-center gap-2">
                <i class="fas fa-heartbeat"></i>
                Sakit
            </span>
            @else
            <span
                class="px-4 py-2 rounded-full text-sm font-semibold bg-red-500/20 text-red-400 border border-red-500/50 inline-flex items-center gap-2">
                <i class="fas fa-times-circle"></i>
                Tidak Hadir
            </span>
            @endif
        </div>
        <div class="flex gap-3">
            <a href="{{ route('attendances.index') }}"
                class="h-min px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <a href="{{ route('attendances.edit', $attendance->id) }}"
                class="h-min px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-green-500/50 transition-all text-white inline-flex items-center gap-2">
                <i class="fa-solid fa-pen"></i>
                <span>Edit</span>
            </a>
        </div>
    </div>

    <!-- Info Grid -->
    <div class="flex justify-between bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">


        <!-- Attendance Information -->
        <div class="w-full">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-clock text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-white">Informasi Waktu</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-calendar w-5"></i> Tanggal
                    </p>
                    <p class="text-white font-medium">
                        {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-sign-in-alt w-5"></i> Waktu Masuk
                    </p>
                    <p class="text-white font-medium">{{ $attendance->waktu_masuk ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-sign-out-alt w-5"></i> Waktu Keluar
                    </p>
                    <p class="text-white font-medium">{{ $attendance->waktu_keluar ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Employee & Status Information -->
        <div class="w-full">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-user text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-white">Informasi Pegawai</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-id-card w-5"></i> ID Absensi
                    </p>
                    <p class="text-white font-medium">{{ $attendance->id }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-user-circle w-5"></i> Nama Pegawai
                    </p>
                    <p class="text-white font-medium">{{ $attendance->employee->nama_lengkap ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-clipboard-check w-5"></i> Status Absensi
                    </p>
                    <p class="text-white font-medium capitalize">{{ $attendance->status_absensi }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6 bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Aksi</h3>
        <div class="flex gap-3">
            <a href="{{ route('attendances.edit', $attendance->id) }}"
                class="px-4 py-2 bg-green-500/20 text-green-400 rounded-lg hover:bg-green-500/30 transition-all inline-flex items-center gap-2">
                <i class="fas fa-edit"></i>
                <span>Edit Data</span>
            </a>

            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus data absensi ini?')"
                    class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500/30 transition-all inline-flex items-center gap-2">
                    <i class="fas fa-trash"></i>
                    <span>Hapus Data</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
