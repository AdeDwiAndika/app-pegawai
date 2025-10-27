@extends('master')
@section('title', 'Edit Departemen')

@section('content')
<div class="max-w-xl mx-auto mt-10 border border-gray-200 p-6 rounded-[24px]">
    <div class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Departemen</h1>
            <p class="text-gray-500 w-3/4">Lengkapi informasi di bawah ini untuk mengedit departemen.</p>
        </div>
        <a href="{{ route('departments.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="flex flex-col gap-5">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_departemen" class="block text-sm font-medium text-gray-700">Nama Departemen</label>
            <input type="text" id="nama_departemen" name="nama_departemen" value="{{ $department->nama_departemen }}"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="Masukkan nama departemen">
        </div>

        <button type="submit"
            class="cursor-pointer hover:opacity-90 w-full bg-gradient-to-br from-green-800 via-green-700 to-green-500 hover:bg-blue-700 text-white font-semibold rounded-full py-2 transition">
            Simpan
        </button>
    </form>
</div>

@endsection