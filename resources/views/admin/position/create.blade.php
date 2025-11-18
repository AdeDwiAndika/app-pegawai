@extends('admin')
@section('title', 'Tambah Jabatan')
@section('page-title', 'Tambah Jabatan')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Tambah Jabatan</h1>
                <p class="text-gray-400 mt-1">Lengkapi form dibawah untuk menambah jabatan pegawai</p>
            </div>
            <a href="{{ route('positions.index') }}"
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

        <form action="{{ route('positions.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-300 mb-2 font-medium">
                    <i class="fas fa-id-badge mr-2"></i>Nama Jabatan
                </label>
                <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan') }}"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all"
                    placeholder="Contoh: Manager, Staff, Supervisor" required>
            </div>

            <div>
                <label class="block text-gray-300 mb-2 font-medium">
                    <i class="fas fa-money-bill-wave mr-2"></i>Gaji Pokok
                </label>
                <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" step="0.01"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all"
                    placeholder="Contoh: 5000000" required>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('positions.index') }}"
                    class="px-6 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
