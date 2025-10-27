@extends('master')
@section('title', 'Position')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Data Jabatan</h1>

        <a href="{{ route('positions.create') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Data Jabatan</span>
        </a>
    </div>

    <!-- Alert -->
    @if (session('success'))
    <div class="mb-4 p-3 rounded-full bg-green-50 text-green-800 border border-green-600">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-[24px] border border-gray-300">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-green-50 border-b-[3px] border-green-500">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Jabatan</th>
                    <th class="py-3 px-4">Gaji Pokok</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($positions as $position)
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="py-3 px-4 text-center">{{ $position->id }}</td>
                    <td class="py-3 px-4 text-center space-x-3">{{ $position->nama_jabatan ?? '-' }}</td>
                    <td class="py-3 px-4 text-center space-x-3">
                        Rp{{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 text-center space-x-3">
                        <a href="{{ route('positions.show', $position->id) }}"
                            class="text-blue-600 hover:underline">Lihat</a>
                        <a href="{{ route('positions.edit', $position->id) }}"
                            class="text-green-600 hover:underline">Edit</a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')"
                                class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada data gaji</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $positions->links('vendor.pagination.tailwind') }}
    </div>

</div>
@endsection