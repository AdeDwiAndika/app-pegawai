@extends('master')
@section('title', 'Tambah Jabatan')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white border border-gray-200 rounded-[24px] p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Jabatan</h1>
            <p class="text-gray-500 w-3/4">Lengkapi form dibawah untuk menambah jabatan pegawai</p>
        </div>

        <a href="{{ route('salaries.index') }}"
            class="px-4 py-2 space-x-2 inline-flex items-center bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Alert Error -->
    @if ($errors->any())
    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800 border border-red-300">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('positions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block text-gray-700">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" step="0.01"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500">

        </div>

        <button type="submit"
            class="px-4 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition">Simpan</button>
    </form>
</div>
@endsection
