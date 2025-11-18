@extends('pegawai')

@section('content')
<div class="p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold">Informasi Umum</h1>
        <p class="text-gray-600">Selamat datang, <span class="font-semibold">{{ $employee->nama_lengkap }}</span></p>
    </div>

    <!-- Info Profil Singkat -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <p class="text-blue-100 text-sm">Departemen</p>
                <p class="font-bold text-lg">{{ $employee->department?->nama_departemen ?? '-' }}</p>
            </div>
            <div>
                <p class="text-blue-100 text-sm">Jabatan</p>
                <p class="font-bold text-lg">{{ $employee->position?->nama_jabatan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-blue-100 text-sm">Status Hari Ini</p>
                <p class="font-bold text-lg">
                    @if($absenHariIni && $absenHariIni->waktu_masuk && !$absenHariIni->waktu_keluar)
                    ✓ Sudah Check In
                    @elseif($absenHariIni && $absenHariIni->waktu_keluar)
                    ✓ Sudah Check Out
                    @else
                    ✗ Belum Absen
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Statistik Absensi -->
    <h2 class="text-xl font-semibold mb-4">Statistik Absensi</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

        <!-- Total Hadir -->
        <div class="bg-white shadow-sm rounded-xl p-5 border-l-4 border-green-500">
            <div class="flex items-center gap-3 w-full justify-between">
                <h3 class="text-xl font-medium text-gray-600">Total Hadir</h3>
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalHadir }}</p>
            </div>
        </div>

        <!-- Total Alpha -->
        <div class="bg-white shadow-sm rounded-xl p-5 border-l-4 border-red-500">
            <div class="flex items-center gap-3 w-full justify-between">
                <h3 class="text-xl font-medium text-gray-600">Total Alpha</h3>
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-4xl font-bold text-red-600 mt-2">{{ $totalAlpha }}</p>
            </div>
        </div>

        <!-- Total Izin -->
        <div class="bg-white shadow-sm rounded-xl p-5 border-l-4 border-yellow-500">
            <div class="flex items-center gap-3 w-full justify-between">
                <h3 class="text-xl font-medium text-gray-600">Total Izin</h3>
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-4xl font-bold text-yellow-600 mt-2">{{ $totalIzin }}</p>
            </div>
        </div>

        <!-- Total Sakit -->
        <div class="bg-white shadow-sm rounded-xl p-5 border-l-4 border-blue-500">
            <div class="flex items-center gap-3 w-full justify-between">
                <h3 class="text-xl font-medium text-gray-600">Total Sakit</h3>
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalSakit }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm rounded-xl p-6 border mb-6">
        <h3 class="text-lg font-semibold mb-4">Gaji Terakhir</h3>
        @if($gajiTerakhir)
        <div class="space-y-2">
            <div class="flex justify-between">
                <span class="text-gray-600">Periode:</span>
                <span class="font-semibold">
                    @php
                    try {
                    echo \Carbon\Carbon::parse($gajiTerakhir->bulan)->locale('id')->translatedFormat('F Y');
                    } catch (\Exception $e) {
                    echo $gajiTerakhir->bulan;
                    }
                    @endphp
                </span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Gaji Pokok:</span>
                <span class="font-semibold">Rp {{ number_format($gajiTerakhir->gaji_pokok, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Tunjangan:</span>
                <span class="font-semibold text-green-600">+ Rp
                    {{ number_format($gajiTerakhir->tunjangan, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Potongan:</span>
                <span class="font-semibold text-red-600">- Rp
                    {{ number_format($gajiTerakhir->potongan, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between pt-3 border-t mt-3">
                <span class="font-bold">Total Gaji:</span>
                <span class="font-bold text-green-700 text-lg">Rp
                    {{ number_format($gajiTerakhir->total_gaji, 0, ',', '.') }}</span>
            </div>
        </div>
        @else
        <p class="text-gray-500 text-center py-8">Belum ada data gaji</p>
        @endif
    </div>

    <!-- Pengumuman -->
    @if($pengumuman->count() > 0)
    <div class="bg-white shadow-sm rounded-xl p-6 border">
        <h3 class="text-lg font-semibold mb-4">📢 Pengumuman Terbaru</h3>
        <div class="space-y-3">
            @foreach($pengumuman as $item)
            <div class="border-l-4 border-blue-500 pl-4 py-2 hover:bg-gray-50 transition">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h4 class="font-semibold">{{ $item->title }}</h4>
                        <p class="text-sm text-gray-600 mt-1">{{ $item->content }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <p class="text-xs text-gray-400">
                                Dibuat {{ $item->created_at->locale('id')->diffForHumans() }}
                            </p>
                            @if($item->expires_at)
                            <p class="text-xs {{ $item->isExpired() ? 'text-red-500' : 'text-orange-500' }}">
                                @if($item->isExpired())
                                • Sudah kadaluarsa
                                @else
                                • Berlaku hingga
                                {{ \Carbon\Carbon::parse($item->expires_at)->locale('id')->translatedFormat('d F Y') }}
                                @endif
                            </p>
                            @endif
                        </div>
                    </div>
                    @if(!$item->isExpired())
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Aktif</span>
                    @else
                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Expired</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
