@extends('master')
@section('title', 'Edit Salary')

@section('content')
<div class="max-w-xl mt-10 mx-auto border border-gray-200 p-6 rounded-[24px]">
    <div class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Data Position</h1>
            <p class="text-gray-500 w-3/4">Lengkapi informasi di bawah ini untuk mengedit salary.</p>
        </div>
        <a href="{{ route('positions.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="space-y-4 ">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $position->nama_jabatan }}" required>
        </div>

        <div>
            <label class="block text-gray-700">Gaji Pokok</label>
            <input type="number" step="0.01" name="gaji_pokok"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $position->gaji_pokok }}" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('positions.index') }}" class="px-4 py-2 bg-gray-200 rounded-full">Batal</a>
            <button type="submit"
                class="cursor-pointer hover:opacity-90 transition px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white rounded-full hover:bg-blue-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection
