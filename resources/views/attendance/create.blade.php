@extends('master')
@section('title', 'Tambah Absen Manual')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white border border-gray-200 rounded-[24px] w-full p-6 relative">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Absen Manual</h1>
            <p class="text-gray-500 w-3/4">Lengkapi form dibawah untuk menambah absensi secara manual</p>
        </div>

        <a href="{{ route('attendances.index') }}"
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

    <form action="{{ route('attendances.store') }}" method="POST" class="space-y-3">
        @csrf

        <div>
            <label class="block text-gray-700 mb-2">Karyawan</label>
            <select name="karyawan_id"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Tanggal</label>
            <input type="date" name="tanggal"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Waktu Masuk</label>
            <input type="time" name="waktu_masuk"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Waktu Keluar</label>
            <input type="time" name="waktu_keluar"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Status Absensi</label>
            <select name="status_absensi"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                <option value="">-- Pilih Status --</option>
                <option value="hadir">Hadir</option>
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
                <option value="alpha">Alpha</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('attendances.index') }}" class="px-4 py-2 bg-gray-200 rounded-full">Batal</a>
            <button type="submit"
                class="px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white rounded-full ">Tambah</button>
        </div>
    </form>
</div>
@endsection
