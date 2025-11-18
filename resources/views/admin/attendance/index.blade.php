@extends('admin')
@section('title', 'Attendance')
@section('page-title', 'List Absensi')

@section('search-form')
<form action="{{ route('attendances.index') }}" method="GET" class="relative flex-1 max-w-md">
    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
    <input type="text" name="search" placeholder="Cari absensi.." value="{{ request()->input('search') }}"
        class="w-full bg-gray-800/50 border border-gray-700 rounded-lg pl-12 pr-4 py-2.5 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500">
    @if(request()->filled('search'))
    <a href="{{ route('attendances.index') }}"
        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-all">
        <i class="fas fa-times"></i>
    </a>
    @endif
</form>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Alert -->
    @if (session('success'))
    <div class="mb-6 p-4 rounded-xl bg-green-500/20 text-green-400 border border-green-500/50 backdrop-blur-lg">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    Daftar Absensi
                    <span class="text-sm font-normal text-gray-400">({{ $attendances->total() }} Absen)</span>
                </h3>
                @if(request()->filled('search'))
                <p class="text-sm text-gray-400 mt-1">
                    Hasil pencarian untuk "<span class="text-blue-400">{{ request()->input('search') }}</span>"
                    - {{ $attendances->total() }} Absensi ditemukan
                </p>
                @endif
            </div>
            <div class="flex gap-3">
                <a href="{{ route('attendances.create') }}"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white">
                    <i class="fas fa-plus mr-2"></i>Tambah Absensi
                </a>
            </div>
        </div>
        <div class="overflow-x-auto bg-gray-900/80 border border-white/10 rounded-xl shadow">
            <table class="min-w-full text-sm text-gray-300">
                <thead class="bg-gray-800/50 border-b border-white/10">
                    <tr>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">ID</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">Karyawan</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">Tanggal</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">Waktu Masuk</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">Waktu Keluar</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-200">Status</th>
                        <th class="py-3 px-4 text-center font-medium text-gray-200">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">
                    @forelse ($attendances as $atten)
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="py-3 px-4">{{ $atten->id }}</td>
                        <td class="py-3 px-4">{{ $atten->employee->nama_lengkap ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $atten->tanggal }}</td>
                        <td class="py-3 px-4">{{ $atten->waktu_masuk }}</td>
                        <td class="py-3 px-4">{{ $atten->waktu_keluar }}</td>
                        <td class="py-3 px-4 capitalize">

                            @php
                            $color = [
                            'hadir' => 'text-green-400',
                            'izin' => 'text-yellow-400',
                            'sakit' => 'text-blue-400',
                            'alpha' => 'text-red-400',
                            ][$atten->status_absensi] ?? 'text-gray-300';
                            @endphp

                            <span class="font-semibold {{ $color }}">
                                {{ $atten->status_absensi }}
                            </span>
                        </td>

                        <td class="py-3 px-4 text-center space-x-4">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('attendances.show', $atten->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('attendances.edit', $atten->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('attendances.destroy', $atten->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus departemen ini?')"
                                        class="px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500/30 transition-all"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="py-6 text-center text-gray-500">
                            Belum ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table Container -->


    <!-- Pagination -->
    <div class="mt-4">
        {{ $attendances->links('vendor.pagination.tailwind') }}
    </div>

</div>
@endsection
