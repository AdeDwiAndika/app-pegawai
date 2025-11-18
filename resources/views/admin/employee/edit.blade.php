@extends('admin')
@section('title', 'Edit Pegawai')
@section('page-title', 'Edit Data Pegawai')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Edit Data Pegawai</h1>
                <p class="text-gray-400 mt-1">Perbarui informasi pegawai <span
                        class="text-blue-400 font-semibold">{{ $employee->nama_lengkap }}</span></p>
            </div>
            <a href="{{ route('employees.index') }}"
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

        <!-- Form -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Personal Information Section -->
            <div class="border-b border-gray-800 pb-5">
                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-blue-400"></i>
                    Informasi Pribadi
                </h3>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Nama Lengkap -->
                    <div class="col-span-2">
                        <label for="nama_lengkap" class="block text-gray-300 mb-2 font-medium">
                            Nama Lengkap <span class="text-red-400">*</span>
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-all"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-300 mb-2 font-medium">
                            Email <span class="text-red-400">*</span>
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $employee->email) }}"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-all"
                            placeholder="contoh@email.com" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="nomor_telepon" class="block text-gray-300 mb-2 font-medium">
                            Nomor Telepon <span class="text-red-400">*</span>
                        </label>
                        <input type="text" id="nomor_telepon" name="nomor_telepon"
                            value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-all"
                            placeholder="08xxxxxxxxxx" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-gray-300 mb-2 font-medium">
                            Tanggal Lahir <span class="text-red-400">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all"
                            required>
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-2">
                        <label for="alamat" class="block text-gray-300 mb-2 font-medium">
                            Alamat <span class="text-red-400">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition-all"
                            placeholder="Masukkan alamat lengkap"
                            required>{{ old('alamat', $employee->alamat) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Employment Information Section -->
            <div class="border-b border-gray-800 pb-5">
                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-briefcase text-blue-400"></i>
                    Informasi Pekerjaan
                </h3>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Departemen -->
                    <div>
                        <label for="departemen_id" class="block text-gray-300 mb-2 font-medium">
                            Departemen <span class="text-red-400">*</span>
                        </label>
                        <select id="departemen_id" name="departemen_id"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none"
                            required>
                            <option value="" class="bg-gray-800">-- Pilih Departemen --</option>
                            @foreach($departments as $dept)
                            <option value="{{ $dept->id }}"
                                {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}
                                class="bg-gray-800">
                                {{ $dept->nama_departemen }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan_id" class="block text-gray-300 mb-2 font-medium">
                            Jabatan <span class="text-red-400">*</span>
                        </label>
                        <select id="jabatan_id" name="jabatan_id"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none"
                            required>
                            <option value="" class="bg-gray-800">-- Pilih Jabatan --</option>
                            @foreach($positions as $pos)
                            <option value="{{ $pos->id }}"
                                {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}
                                class="bg-gray-800">
                                {{ $pos->nama_jabatan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal Masuk -->
                    <div>
                        <label for="tanggal_masuk" class="block text-gray-300 mb-2 font-medium">
                            Tanggal Masuk <span class="text-red-400">*</span>
                        </label>
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all"
                            required>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-gray-300 mb-2 font-medium">
                            Status <span class="text-red-400">*</span>
                        </label>
                        <select id="status" name="status"
                            class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500 transition-all appearance-none"
                            required>
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}
                                class="bg-gray-800">Aktif</option>
                            <option value="nonaktif"
                                {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}
                                class="bg-gray-800">Non Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('employees.index') }}"
                    class="px-6 py-2.5 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition-all text-white inline-flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white inline-flex items-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    <span>Perbarui Data</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection