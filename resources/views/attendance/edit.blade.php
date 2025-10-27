@extends('master')
@section('title', 'Edit Absensi')

@section('content')
<div class="max-w-xl mt-10 mx-auto border border-gray-200 p-6 rounded-[24px]">
    <div class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Absensi {{ $attendance->employee->nama_lengkap }}</h1>
            <p class="text-gray-500 w-3/4">Lengkapi informasi di bawah ini untuk mengedit absensi.</p>
        </div>
        <a href="{{ route('attendances.index') }}"
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

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="space-y-4 ">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-2">Karyawan</label>
            <select name="karyawan_id"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Tanggal</label>
            <input type="date" name="tanggal"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $attendance->tanggal }}" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Waktu Masuk</label>
            <input type="time" name="waktu_masuk"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ substr($attendance->waktu_masuk, 0, 5) }}" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Waktu Keluar</label>
            <input type="time" name="waktu_keluar"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ substr($attendance->waktu_keluar, 0, 5) }}" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Status Absensi</label>
            <select name="status_absensi"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('attendances.index') }}" class="px-4 py-2 bg-gray-200 rounded-full">Batal</a>
            <button type="submit"
                class="cursor-pointer hover:opacity-90 transition px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white rounded-full hover:bg-blue-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection
