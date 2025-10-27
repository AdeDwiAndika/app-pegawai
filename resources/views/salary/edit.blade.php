@extends('master')
@section('title', 'Edit Salary')

@section('content')
<div class="max-w-xl mt-10 mx-auto border border-gray-200 p-6 rounded-[24px]">
    <div class="flex justify-between items-start mb-6">
        <div class="">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Salary</h1>
            <p class="text-gray-500 w-3/4">Lengkapi informasi di bawah ini untuk mengedit salary.</p>
        </div>
        <a href="{{ route('salaries.index') }}"
            class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-br from-gray-700 via-gray-600 to-gray-500 text-white text-sm font-medium rounded-full shadow hover:opacity-90 transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="space-y-4 ">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-medium mb-2">Karyawan</label>
            <select name="karyawan_id"
                class="w-full border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500 appearance-none">
                @foreach($employee as $emp)
                <option value="{{ $emp->id }}" {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700">Bulan</label>
            <input type="text" name="bulan"
                class="w-full mt-1 border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $salary->bulan }}" required>
        </div>

        <div>
            <label class="block text-gray-700">Gaji Pokok</label>
            <input type="number" step="0.01" name="gaji_pokok"
                class="w-full mt-1 border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $salary->gaji_pokok }}" required>
        </div>

        <div>
            <label class="block text-gray-700">Tunjangan</label>
            <input type="number" name="tunjangan"
                class="w-full mt-1 border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $salary->tunjangan }}">
        </div>

        <div>
            <label class="block text-gray-700">Potongan</label>
            <input type="number" step="0.01" name="potongan"
                class="w-full mt-1 border border-gray-300 rounded-[16px] px-4 py-2 focus:outline-none focus:ring-1 focus:ring-green-500"
                value="{{ $salary->potongan }}">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('salaries.index') }}" class="px-4 py-2 bg-gray-200 rounded-full">Batal</a>
            <button type="submit"
                class="cursor-pointer hover:opacity-90 transition px-4 py-2 bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white rounded-full hover:bg-blue-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection