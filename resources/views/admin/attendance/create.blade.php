@extends('admin')
@section('title', 'Tambah Absen Manual')
@section('page-title', 'Tambah Absen Manual')

@section('content')
<div class="mx-auto">
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Tambah Absen Manual</h1>
                <p class="text-gray-400 mt-1">Lengkapi form dibawah untuk menambah absensi secara manual</p>
            </div>
            <a href="{{ route('attendances.index') }}"
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

        <form action="{{ route('attendances.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-300 mb-2 font-medium">Karyawan</label>
                <select name="karyawan_id"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none">
                    <option value="" class="bg-gray-800">-- Pilih Karyawan --</option>
                    @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" class="bg-gray-800">{{ $emp->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-300 mb-2 font-medium">Tanggal</label>
                <input type="date" name="tanggal"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none"
                    required>
            </div>

            <div>
                <label class="block text-gray-300 mb-2 font-medium">Waktu Masuk</label>
                <input type="time" name="waktu_masuk"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none"
                    required>
            </div>

            <div>
                <label class="block text-gray-300 mb-2 font-medium">Waktu Keluar</label>
                <input type="time" name="waktu_keluar"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none">
            </div>

            <div>
                <label class="block text-gray-300 mb-2 font-medium">Status Absensi</label>
                <select name="status_absensi"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none">
                    <option value="" class="bg-gray-800">-- Pilih Status --</option>
                    <option value="hadir" class="bg-gray-800">Hadir</option>
                    <option value="sakit" class="bg-gray-800">Sakit</option>
                    <option value="izin" class="bg-gray-800">Izin</option>
                    <option value="alpha" class="bg-gray-800">Alpha</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('attendances.index') }}"
                    class="px-6 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-green-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection