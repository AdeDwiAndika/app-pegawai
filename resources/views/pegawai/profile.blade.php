@extends('pegawai')

@section('content')
<div class="p-6">

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Profil Pegawai</h1>
        <p class="text-gray-500 text-sm mt-1">Informasi data pribadi dan jabatan Anda</p>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
        <i class="fas fa-check-circle text-green-500"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-red-500"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
            <div class="flex items-center gap-6">
                <!-- Avatar -->
                <div
                    class="p-3 bg-white rounded-full flex items-center justify-center text-blue-600 text-3xl font-bold shadow-lg">
                    {{ substr($employee->nama_lengkap, 0, 2) }}
                </div>

                <!-- Basic Info -->
                <div class="text-white">
                    <div class="flex items-center gap-4 mb-2">
                        <h2 class="text-2xl font-bold">{{ $employee->nama_lengkap }}</h2>
                        |
                        <p class="text-blue-100">{{ $employee->position?->nama_jabatan ?? '-' }}</p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-building"></i>
                            {{ $employee->department?->nama_departemen ?? '-' }}
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="fas fa-envelope"></i>
                            {{ $employee->email }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="p-8">

            <!-- Section: Informasi Pribadi -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-blue-500"></i>
                    Informasi Pribadi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-id-card text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Nama Lengkap</p>
                            <p class="text-base font-medium text-gray-900">{{ $employee->nama_lengkap }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-base font-medium text-gray-900">{{ $employee->email }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">No Telepon</p>
                            <p class="text-base font-medium text-gray-900">{{ $employee->nomor_telepon ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-calendar text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Tanggal Lahir</p>
                            <p class="text-base font-medium text-gray-900">
                                @if($employee->tanggal_lahir)
                                {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                                @else
                                -
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 md:col-span-2">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="text-base font-medium text-gray-900">{{ $employee->alamat ?? '-' }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 my-8"></div>

            <!-- Section: Informasi Pekerjaan -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-briefcase text-blue-500"></i>
                    Informasi Pekerjaan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-building text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Departemen</p>
                            <p class="text-base font-medium text-gray-900">
                                {{ $employee->department?->nama_departemen ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-tie text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Jabatan</p>
                            <p class="text-base font-medium text-gray-900">
                                {{ $employee->position?->nama_jabatan ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 md:col-span-2">
                        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Gaji Pokok</p>
                            <p class="text-xl font-bold text-green-600">
                                {{ $employee->position?->gaji_pokok ? 'Rp ' . number_format($employee->position->gaji_pokok, 0, ',', '.') : '-' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
