@extends('admin')
@section('title', 'Daftar Pegawai')
@section('page-title', 'Employee List')

@section('search-form')
<form action="{{ route('employees.index') }}" method="GET" class="relative flex-1 max-w-md">
    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
    <input type="text" name="search" placeholder="Search employees..." value="{{ request()->input('search') }}"
        class="w-full bg-gray-800/50 border border-gray-700 rounded-lg pl-12 pr-4 py-2.5 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500">
    @if(request()->filled('search'))
    <a href="{{ route('employees.index') }}"
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

    <!-- Stats Cards -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Pegawai</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $employees->total() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-users text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Pegawai Aktif</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $employees->where('status', 'aktif')->count() }}
                    </h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-green-500/20 flex items-center justify-center">
                    <i class="fas fa-user-check text-green-400 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Pegawai Nonaktif</p>
                    <h3 class="text-3xl font-bold text-white mt-1">
                        {{ $employees->where('status', 'nonaktif')->count() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-gray-500/20 flex items-center justify-center">
                    <i class="fas fa-user-minus text-gray-400 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Current Page</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ $employees->currentPage() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-file-alt text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    Daftar Pegawai
                    <span class="text-sm font-normal text-gray-400">({{ $employees->total() }} pegawai)</span>
                </h3>
                @if(request()->filled('search'))
                <p class="text-sm text-gray-400 mt-1">
                    Hasil pencarian untuk "<span class="text-blue-400">{{ request()->input('search') }}</span>"
                    - {{ $employees->total() }} pegawai ditemukan
                </p>
                @endif
            </div>
            <div class="flex gap-3">
                <a href="{{ route('employees.create') }}"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-xl font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white">
                    <i class="fas fa-plus mr-2"></i>Tambah Pegawai
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-hashtag mr-2"></i>No
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-user mr-2"></i>Nama Lengkap
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-phone mr-2"></i>Nomor Telepon
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-map-marker-alt mr-2"></i>Alamat
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-info-circle mr-2"></i>Status
                        </th>
                        <th class="text-left py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-cog mr-2"></i>Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $index => $employee)
                    <tr class="border-b border-gray-800/50 hover:bg-blue-500/5 transition-all text-white">
                        <td class="py-4 px-4 text-gray-300">{{ $index + $employees->firstItem() }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr($employee->nama_lengkap, 0, 1)) }}
                                </div>
                                <span class="font-medium">{{ $employee->nama_lengkap }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-gray-400">{{ $employee->email }}</td>
                        <td class="py-4 px-4 text-gray-400">{{ $employee->nomor_telepon }}</td>
                        <td class="py-4 px-4 text-gray-400">{{ Str::limit($employee->alamat, 30) }}</td>
                        <td class="py-4 px-4">
                            @if($employee->status == 'aktif')
                            <span
                                class="px-3 py-1 rounded-full text-xs font-semibold bg-green-500/20 text-green-400 border border-green-500/50">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                            @else
                            <span
                                class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-500/20 text-gray-400 border border-gray-500/50">
                                <i class="fas fa-times-circle mr-1"></i>Nonaktif
                            </span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus pegawai ini?')"
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
                        <td colspan="7" class="py-12 text-center text-gray-400">
                            @if(request()->filled('search'))
                            <i class="fas fa-search text-5xl mb-4 block opacity-50"></i>
                            <p class="text-lg">Tidak ada pegawai yang ditemukan untuk "{{ request()->input('search') }}"
                            </p>
                            <a href="{{ route('employees.index') }}"
                                class="inline-block mt-4 px-4 py-2 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali ke semua pegawai
                            </a>
                            @else
                            <i class="fas fa-users text-5xl mb-4 block opacity-50"></i>
                            <p class="text-lg">Belum ada data pegawai</p>
                            <a href="{{ route('employees.create') }}"
                                class="inline-block mt-4 px-4 py-2 bg-gradient-to-r from-blue-600 to-pink-600 text-white rounded-lg hover:shadow-lg hover:shadow-blue-500/50 transition-all">
                                <i class="fas fa-plus mr-2"></i>Tambah Pegawai Pertama
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($employees->hasPages())
        <div class="mt-6">
            <div class="flex justify-center items-center gap-2">
                {{-- Previous Page Link --}}
                @if ($employees->onFirstPage())
                <span
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center text-gray-600 cursor-not-allowed">
                    <i class="fas fa-arrow-left text-sm"></i>
                </span>
                @else
                <a href="{{ $employees->previousPageUrl() }}"
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-all text-white">
                    <i class="fas fa-arrow-left text-sm"></i>
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)
                @if ($page == $employees->currentPage())
                <span
                    class="w-10 h-10 rounded-lg bg-blue-600 border border-blue-500 flex items-center justify-center font-semibold text-white">{{ $page }}</span>
                @else
                <a href="{{ $url }}"
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-all text-white">{{ $page }}</a>
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($employees->hasMorePages())
                <a href="{{ $employees->nextPageUrl() }}"
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-all text-white">
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
                @else
                <span
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center text-gray-600 cursor-not-allowed">
                    <i class="fas fa-arrow-right text-sm"></i>
                </span>
                @endif
            </div>

            <div class="text-center mt-4 text-sm text-gray-400">
                Menampilkan {{ $employees->firstItem() }} - {{ $employees->lastItem() }} dari {{ $employees->total() }}
                pegawai
            </div>
        </div>
        @endif
    </div>
</div>
@endsection