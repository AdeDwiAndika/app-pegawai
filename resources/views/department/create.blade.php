@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')

<div class="max-w-md mx-auto mt-10 bg-white border border-gray-200 rounded-[24px] w-full p-6 relative">

    <div class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Departemen</h1>
            <p class="text-gray-500 w-3/4">Lengkapi informasi di bawah ini untuk menambah departemen.</p>
        </div>
        <a href="{{ route('departments.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded-[20px] mb-4">

        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach

    </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <input type="text" id="nama_departemen" name="nama_departemen" value="{{ old('nama_departemen') }}"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama departemen">
        </div>

        <button type="submit"
            class="w-full bg-gradient-to-br from-green-800 via-green-700 to-green-500 hover:bg-blue-700 text-white font-semibold rounded-full py-2 transition">
            Simpan
        </button>
    </form>
</div>

@endsection
