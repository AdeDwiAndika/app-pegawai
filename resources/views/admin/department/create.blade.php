@extends('admin')
@section('title', 'Daftar Departemen')
@section('page-title', 'Tambah Departemen')
@section('content')
<div class="mx-auto">
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Tambah Data Pegawai</h1>
                <p class="text-gray-400 mt-1">Isi form dibawah untuk menambah data lengkap pegawai</p>
            </div>
            <a href="{{ route('departments.index') }}"
                class="px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>

        <!-- Alert Error -->
        @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-500/20 text-red-400 border border-red-500/50">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-circle text-xl mt-0.5"></i>
                <div class="flex-1">
                    <p class="font-semibold mb-2">Terdapat kesalahan:</p>
                    <ul class="list-disc ml-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('departments.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nama_departemen" class="block text-gray-300 mb-2 font-medium">
                    Nama Departemen <span class="text-red-400">*</span>
                </label>
                <input type="text" id="nama_departemen" name="nama_departemen" value="{{ old('nama_departemen') }}"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 transition-all"
                    placeholder="Masukkan nama departemen">
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('departments.index') }}"
                    class="px-6 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg font-semibold hover:shadow-lg hover:shadow-purple-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Data</span>
                </button>
            </div>
        </form>
    </div>
</div>


@endsection