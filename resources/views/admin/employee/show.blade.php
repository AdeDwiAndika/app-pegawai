@extends('admin')
@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Header Card -->
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6 mb-6">
        <div class="flex justify-between items-start">
            <div class="flex items-center gap-4">
                <div
                    class="w-20 h-20 rounded-full bg-gradient-to-r from-blue-600 to-blue-900 flex items-center justify-center text-white text-3xl font-bold">
                    {{ strtoupper(substr($employee->nama_lengkap, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">{{ $employee->nama_lengkap }}</h1>
                    <p class="text-gray-400 mt-1">
                        <i class="fas fa-briefcase mr-2"></i>{{ $employee->position->nama_jabatan ?? '-' }}
                    </p>
                    <p class="text-gray-400 mt-1">
                        <i class="fas fa-building mr-2"></i>{{ $employee->department->nama_departemen ?? '-' }}
                    </p>
                </div>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('employees.index') }}"
                    class="px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}"
                    class="px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-purple-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-pen"></i>
                    <span>Edit</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Status Badge -->
    <div class="mb-6">
        @if($employee->status == 'aktif')
        <span
            class="px-4 py-2 rounded-full text-sm font-semibold bg-green-500/20 text-green-400 border border-green-500/50 inline-flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            Status Aktif
        </span>
        @else
        <span
            class="px-4 py-2 rounded-full text-sm font-semibold bg-gray-500/20 text-gray-400 border border-gray-500/50 inline-flex items-center gap-2">
            <i class="fas fa-times-circle"></i>
            Status Nonaktif
        </span>
        @endif
    </div>

    <!-- Info Grid -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                    <i class="fas fa-user text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-white">Informasi Pribadi</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-envelope w-5"></i> Email
                    </p>
                    <p class="text-white font-medium">{{ $employee->email }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-phone w-5"></i> Nomor Telepon
                    </p>
                    <p class="text-white font-medium">{{ $employee->nomor_telepon }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-calendar w-5"></i> Tanggal Lahir
                    </p>
                    <p class="text-white font-medium">
                        {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                    <p class="text-gray-500 text-sm mt-1">
                        ({{ \Carbon\Carbon::parse($employee->tanggal_lahir)->age }} tahun)
                    </p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-map-marker-alt w-5"></i> Alamat
                    </p>
                    <p class="text-white font-medium">{{ $employee->alamat }}</p>
                </div>
            </div>
        </div>

        <!-- Employment Information -->
        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-briefcase text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-white">Informasi Pekerjaan</h3>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-building w-5"></i> Departemen
                    </p>
                    <p class="text-white font-medium">{{ $employee->department->nama_departemen ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-id-badge w-5"></i> Jabatan
                    </p>
                    <p class="text-white font-medium">{{ $employee->position->nama_jabatan ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-1">
                        <i class="fas fa-calendar-check w-5"></i> Tanggal Masuk
                    </p>
                    <p class="text-white font-medium">
                        {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                    <p class="text-gray-500 text-sm mt-1">
                        ({{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffForHumans() }})
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6 bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Aksi</h3>
        <div class="flex gap-3">
            <a href="{{ route('employees.edit', $employee->id) }}"
                class="px-4 py-2 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all inline-flex items-center gap-2">
                <i class="fas fa-edit"></i>
                <span>Edit Data</span>
            </a>

            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus pegawai ini?')"
                    class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500/30 transition-all inline-flex items-center gap-2">
                    <i class="fas fa-trash"></i>
                    <span>Hapus Data</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
