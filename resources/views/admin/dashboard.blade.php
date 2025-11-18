@extends('admin')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Message -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-6 mb-6 shadow-lg">
        <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-blue-100">Kelola sistem manajemen kepegawaian dengan mudah</p>
    </div>

    <!-- Statistik Umum -->
    <h3 class="text-lg font-semibold text-white mb-4">Statistik Umum</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-gray-900/80 border border-white/10 rounded-2xl p-6 hover:border-blue-500/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Pegawai</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $totalEmployees }}</h3>
                </div>
                <div class="bg-blue-500/20 p-4 rounded-xl">
                    <i class="fas fa-users text-blue-400 text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 border border-white/10 rounded-2xl p-6 hover:border-purple-500/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Departemen</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $totalDepartments }}</h3>
                </div>
                <div class="bg-purple-500/20 p-4 rounded-xl">
                    <i class="fas fa-building text-purple-400 text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 border border-white/10 rounded-2xl p-6 hover:border-green-500/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Jabatan</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $totalPositions }}</h3>
                </div>
                <div class="bg-green-500/20 p-4 rounded-xl">
                    <i class="fas fa-briefcase text-green-400 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Absensi Hari Ini -->
    <h3 class="text-lg font-semibold text-white mb-4">Absensi Hari Ini
        ({{ Carbon\Carbon::today()->locale('id')->translatedFormat('d F Y') }})</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
        <div class="bg-gray-900/80 border border-white/10 rounded-2xl px-4 py-3">
            <div class="flex items-center gap-5">
                <i class="fas fa-check-circle text-green-400 bg-green-400/20 p-4 rounded-full text-xl"></i>
                <div>
                    <p class="text-gray-400 text-sm">Hadir</p>
                    <h3 class="text-xl font-bold ">{{ $hadirToday ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 border border-white/10 rounded-2xl px-4 py-3">
            <div class="flex items-center gap-5">
                <i class="fas fa-calendar-check text-yellow-400 text-xl bg-yellow-400/20 p-4 rounded-full"></i>
                <div>
                    <p class="text-gray-400 text-sm">Izin</p>
                    <h3 class="text-xl font-bold">{{ $izinToday ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 border border-white/10 rounded-2xl px-4 py-3">
            <div class="flex items-center gap-5">
                <i class="fas fa-heartbeat text-blue-400 text-xl bg-blue-400/20 p-4 rounded-full"></i>
                <div>
                    <p class="text-gray-400 text-sm">Sakit</p>
                    <h3 class="text-xl font-bold text-blue-400 mt-1">{{ $sakitToday ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 border border-white/10 rounded-2xl px-4 py-3">
            <div class="flex items-center gap-5">
                <i class="fas fa-times-circle text-red-400 text-xl bg-red-400/20 p-4 rounded-full"></i>
                <div>
                    <p class="text-gray-400 text-sm">Alpha</p>
                    <h3 class="text-xl font-bold text-red-400 mt-1">{{ $alphaToday ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid 2 Kolom -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <!-- Buat Pengumuman -->
        <div class="bg-gray-900/80 border border-white/10 rounded-2xl p-6">
            <h3 class="text-xl font-bold text-white flex items-center gap-2 mb-4">
                Buat Pengumuman
            </h3>

            @if(session('announcement_success'))
            <div class="bg-green-500/20 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg mb-4">
                {{ session('announcement_success') }}
            </div>
            @endif

            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                        required>
                    @error('title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Konten</label>
                    <textarea name="content" rows="4"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500"
                        required>{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Berlaku Hingga (Opsional)</label>
                    <input type="date" name="expires_at" value="{{ old('expires_at') }}"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-blue-500">
                    @error('expires_at')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Pengumuman
                </button>
            </form>
        </div>

        <!-- Pegawai Terbaru -->
        <div class="bg-gray-900/80 border border-white/10 rounded-2xl p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    Pegawai Terbaru
                </h3>
                <a href="{{ route('employees.index') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                    Lihat Semua →
                </a>
            </div>

            @if($recentEmployees->count() > 0)
            <ul class="space-y-3">
                @foreach($recentEmployees as $employee)
                <li
                    class="flex items-center justify-between p-3 bg-gray-800/50 rounded-lg hover:bg-gray-800 transition">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-500/20 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-blue-400"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-medium text-sm">{{ $employee->nama_lengkap }}</h4>
                            <p class="text-gray-400 text-xs">
                                {{ $employee->department?->nama_departemen ?? '-' }} •
                                {{ $employee->position?->nama_jabatan ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <span class="text-gray-500 text-xs">
                        {{ $employee->created_at->locale('id')->diffForHumans() }}
                    </span>
                </li>
                @endforeach
            </ul>
            @else
            <div class="text-center py-8">
                <i class="fas fa-users text-gray-600 text-4xl mb-3"></i>
                <p class="text-gray-500 text-sm">Belum ada pegawai terdaftar</p>
            </div>
            @endif
        </div>

    </div>

</div>
@endsection