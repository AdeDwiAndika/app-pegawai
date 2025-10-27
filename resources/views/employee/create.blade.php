@extends('master')
@section('title', 'Tambah Pegawai')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-[24px] border border-gray-200">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Data Pegawai</h1>
            <p class="text-gray-500 w-3/4">Isi form dibawah untuk menambah data lengkap pegawai</p>
        </div>
        <a href="{{ route('employees.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Alert Error -->
    @if ($errors->any())
    <div class="mb-4 p-3 rounded-[26px] bg-red-100 text-red-800 border border-red-300">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form -->
    <form action="{{ route('employees.store') }}" method="POST" class="space-y-3">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="nama_lengkap" class="block text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label for="nomor_telepon" class="block text-gray-700 mb-2">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label for="tanggal_lahir" class="block text-gray-700 mb-2">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-gray-700 mb-2">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">{{ old('alamat') }}</textarea>
        </div>

        <!-- Tanggal Masuk -->
        <div>
            <label for="tanggal_masuk" class="block text-gray-700 mb-2">Tanggal Masuk</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-gray-700 mb-2">Status</label>
            <select id="status" name="status"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 bg-white focus:ring-2 focus:ring-green-500 focus:outline-none appearance-none">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <!-- Departemen -->
        <div>
            <label for="departemen_id" class="block text-gray-700 mb-2">Departemen</label>
            <select id="departemen_id" name="departemen_id"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 bg-white focus:ring-2 focus:ring-green-500 focus:outline-none appearance-none">
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departments as $d)
                <option value="{{ $d->id }}" {{ old('departemen_id') == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_departemen }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jabatan -->
        <div>
            <label for="jabatan_id" class="block text-gray-700 mb-2">Jabatan</label>
            <select id="jabatan_id" name="jabatan_id"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 bg-white focus:ring-2 focus:ring-green-500 focus:outline-none appearance-none">
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($positions as $p)
                <option value="{{ $p->id }}" {{ old('jabatan_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_jabatan }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="pt-4">
            <button type="submit"
                class="w-full inline-flex justify-center items-center space-x-2 px-5 py-3 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white text-sm font-semibold rounded-full shadow hover:opacity-90 transition">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Simpan Data</span>
            </button>
        </div>
    </form>
</div>
@endsection
