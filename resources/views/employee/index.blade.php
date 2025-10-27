@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
<div class="max-w-6xl mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Daftar Pegawai</h1>

        <a href="{{ route('employees.create') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Pegawai</span>
        </a>
    </div>

    <!-- Alert -->
    @if (session('success'))
    <div class="mb-4 p-3 rounded-full bg-green-50 text-green-800 border border-green-600">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-[24px] border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-green-50">
                <tr class="text-left text-gray-700">
                    <th class="py-3 px-4 border-b-[3px] border-green-600">No</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600">Nama Lengkap</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600">Email</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600">Nomor Telepon</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600">Alamat</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600">Status</th>
                    <th class="py-3 px-4 border-b-[3px] border-green-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $index => $employee)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4 text-center">{{ $index + $employees->firstItem() }}</td>
                    <td class="py-3 px-4 font-medium text-gray-800">{{ $employee->nama_lengkap }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $employee->email }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $employee->nomor_telepon }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $employee->alamat }}</td>
                    <td class="py-3 px-4">
                        @if($employee->status == 'aktif')
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Aktif</span>
                        @else
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-200 text-gray-700">Nonaktif</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center space-x-3">
                        <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:underline">
                            Detail
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-green-600 hover:underline">
                            Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                class="text-red-600 hover:underline">Hapus
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
        {{ $employees->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection