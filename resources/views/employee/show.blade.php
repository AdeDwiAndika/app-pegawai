@extends('master')
@section('title', 'Detail Pegawai')
@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white border border-gray-200 rounded-[24px] w-full p-6 relative">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Detail Pegawai</h1>
            <p class="text-gray-500 w-3/4">Berikut merupakan informasi lengkap mengenai pegawai</p>
        </div>
        <div class="">
            <a href="{{ route('employees.index') }}"
                class="px-4 py-2 space-x-2 inline-flex items-center bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full hover:opacity-90 transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <a href="{{ route('employees.edit', $employee->id) }}"
                class="px-4 py-2 space-x-2 inline-flex items-center bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white text-sm font-medium rounded-full hover:opacity-90 "><i
                    class="fa-solid fa-pen"></i>
                <span>Edit</span></a>
        </div>
    </div>
    <div class="overflow-x-auto rounded-[16px] border border-gray-300">
        <table class="min-w-full text-sm text-left text-gray-700">
            <tbody>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold w-1/3 rounded-tl-[16px] border-r border-gray-300">
                        Nama Lengkap</th>
                    <td class="px-6 py-3">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold border-r border-gray-300">Email</th>
                    <td class="px-6 py-3">{{ $employee->email }}</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold border-r border-gray-300">Nomor Telepon</th>
                    <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold border-r border-gray-300">Tanggal Lahir</th>
                    <td class="px-6 py-3">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold border-r border-gray-300">Alamat</th>
                    <td class="px-6 py-3">{{ $employee->alamat }}</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <th class="bg-green-50 px-6 py-3 font-semibold border-r border-gray-300">Tanggal Masuk</th>
                    <td class="px-6 py-3">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th class="bg-green-50 px-6 py-3 font-semibold rounded-bl-[16px] border-r border-gray-300">Status
                    </th>
                    <td class="px-6 py-3 font-semibold text-green-600">
                        {{ ucfirst($employee->status) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection