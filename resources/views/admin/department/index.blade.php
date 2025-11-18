@extends('admin')
@section('title', 'Daftar Departemen')
@section('page-title', 'Department List')

@section('search-form')
<form action="{{ route('departments.index') }}" method="GET" class="relative flex-1 max-w-md">
    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
    <input type="text" name="search" placeholder="Cari departemen..." value="{{ request()->input('search') }}"
        class="w-full bg-gray-800/50 border border-gray-700 rounded-lg pl-12 pr-4 py-2.5 text-white placeholder-gray-400 focus:outline-none focus:border-blue-500">
    @if(request()->filled('search'))
    <a href="{{ route('departments.index') }}"
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
    <div class="mb-6 p-4 rounded-xl bg-blue-500/20 text-blue-400 border border-blue-500/50 backdrop-blur-lg">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Department Table -->
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    Daftar Departemen
                    <span class="text-sm font-normal text-gray-400">({{ $departments->total() }} departemen)</span>
                </h3>
                @if(request()->filled('search'))
                <p class="text-sm text-gray-400 mt-1">
                    Hasil pencarian untuk "<span class="text-blue-400">{{ request()->input('search') }}</span>"
                    - {{ $departments->total() }} departemen ditemukan
                </p>
                @endif
            </div>
            <div class="flex gap-3">
                <a href="{{ route('departments.create') }}"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white">
                    <i class="fas fa-plus mr-2"></i>Tambah Departemen
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-center py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-hashtag mr-2"></i>No
                        </th>
                        <th class="text-center py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-building mr-2"></i>Nama Departemen
                        </th>
                        <th class="text-center py-4 px-4 text-gray-400 font-semibold text-sm">
                            <i class="fas fa-cog mr-2"></i>Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $index => $department)
                    <tr class="border-b border-gray-800/50 hover:bg-blue-500/5 transition-all text-white">
                        <td class="text-center py-4 px-4 text-gray-300">{{ $index + $departments->firstItem() }}</td>
                        <td class="text-center py-4 px-4 font-medium text-white">
                            <div class="flex items-center justify-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-blue-900 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr($department->nama_departemen, 0, 1)) }}
                                </div>
                                <span>{{ $department->nama_departemen }}</span>
                            </div>
                        </td>
                        <td class="text-center py-4 px-4">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('departments.show', $department->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('departments.edit', $department->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
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
                        <td colspan="3" class="py-12 text-center text-gray-400">
                            @if(request()->filled('search'))
                            <i class="fas fa-search text-5xl mb-4 block opacity-50"></i>
                            <p class="text-lg">Tidak ada departemen yang ditemukan untuk
                                "{{ request()->input('search') }}"
                            </p>
                            <a href="{{ route('departments.index') }}"
                                class="inline-block mt-4 px-4 py-2 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali ke semua departemen
                            </a>
                            @else
                            <i class="fas fa-building text-5xl mb-4 block opacity-50"></i>
                            <p class="text-lg">Belum ada data departemen</p>
                            <a href="{{ route('departments.create') }}"
                                class="inline-block mt-4 px-4 py-2 bg-gradient-to-r from-blue-600 to-emerald-500 text-white rounded-lg hover:shadow-lg hover:shadow-blue-500/50 transition-all">
                                <i class="fas fa-plus mr-2"></i>Tambah Departemen Pertama
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($departments->hasPages())
        <div class="mt-6">
            <div class="flex justify-center items-center gap-2">
                {{-- Previous Page --}}
                @if ($departments->onFirstPage())
                <span
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center text-gray-600 cursor-not-allowed">
                    <i class="fas fa-arrow-left text-sm"></i>
                </span>
                @else
                <a href="{{ $departments->previousPageUrl() }}"
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-all text-white">
                    <i class="fas fa-arrow-left text-sm"></i>
                </a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($departments->getUrlRange(1, $departments->lastPage()) as $page => $url)
                @if ($page == $departments->currentPage())
                <span
                    class="w-10 h-10 rounded-lg bg-blue-600 border border-blue-500 flex items-center justify-center font-semibold text-white">{{ $page }}</span>
                @else
                <a href="{{ $url }}"
                    class="w-10 h-10 rounded-lg bg-gray-800 border border-gray-700 flex items-center justify-center hover:bg-gray-700 transition-all text-white">{{ $page }}</a>
                @endif
                @endforeach

                {{-- Next Page --}}
                @if ($departments->hasMorePages())
                <a href="{{ $departments->nextPageUrl() }}"
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
                Menampilkan {{ $departments->firstItem() }} - {{ $departments->lastItem() }} dari
                {{ $departments->total() }} departemen
            </div>
        </div>
        @endif
    </div>
</div>
@endsection