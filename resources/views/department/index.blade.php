@extends('master')
@section('title', 'Department')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Daftar Departemen</h1>

        <a href="{{ route('departments.create') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Departemen</span>
        </a>
    </div>

    <!-- Alert -->
    @if (session('success'))
    <div class="mb-4 p-3 rounded-full bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-[24px] border border-gray-300">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-green-50 border-b-[3px] border-green-500">
                <tr>
                    <th class="py-3 px-4 text-center">No</th>
                    <th class="py-3 px-4 text-center">Nama Departemen</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $index => $department)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4 text-center">{{ $index + $departments->firstItem() }}</td>
                    <td class="py-3 px-4 text-center font-medium text-gray-800">{{ $department->nama_departemen }}</td>
                    <td class="py-3 px-4 text-center space-x-3">
                        <a href="{{ route('departments.edit', $department->id) }}"
                            class="text-green-600 hover:underline">
                            Edit
                        </a>
                        <a href="{{ route('departments.show', $department->id) }}"
                            class="text-blue-600 hover:underline">Lihat</a>

                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $departments->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection