@extends('master')
@section('title', 'Edit Employee')
@section('content')

<div class="max-w-4xl mt-10 bg-white p-8 rounded-[24px] border mx-auto border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Edit Data Pegawai</h1>
            <p class="text-gray-500 w-3/4">Isi form dibawah untuk mengedit data lengkap pegawai</p>
        </div>
        <a href="{{ route('employees.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->nama_lengkap }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->email }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="nomor_telepon"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->nomor_telepon }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->tanggal_lahir }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->alamat }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk"
                class="w-full mt-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $employee->tanggal_masuk }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Department</label>
            <select name="departemen_id"
                class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ $employee->departemen_id = $dept->id ? 'selected' : '' }}>
                    {{ $dept->nama_departemen }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
            <select name="jabatan_id"
                class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                @foreach($positions as $pos)
                <option value="{{ $pos->id }}" {{ $employee->jabatan_id = $pos->id ? 'selected' : '' }}>
                    {{ $pos->nama_jabatan }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-200 rounded-full">Batal</a>
            <button type="submit"
                class="cursor-pointer hover:opacity-90 transition px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white rounded-full hover:bg-blue-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection
