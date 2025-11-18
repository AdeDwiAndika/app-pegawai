@extends('pegawai')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Absensi</h1>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white p-6 border rounded-xl">
        <!-- Status hari ini -->
        <p class="text-lg mb-3">
            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($today)->locale('id')->translatedFormat('l, d F Y') }}
        </p>

        @if($attendanceToday && $attendanceToday->waktu_masuk && !$attendanceToday->waktu_keluar)
        <p class="mb-4 text-green-700 font-semibold">
            Status: Sudah Check In ({{ $attendanceToday->waktu_masuk }})
        </p>

        <form action="{{ route('employee.attendance.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700">
                Check Out
            </button>
        </form>

        @elseif($attendanceToday && $attendanceToday->waktu_masuk && $attendanceToday->waktu_keluar)
        <p class="mb-4 text-blue-700 font-semibold">
            Status: Absensi Selesai
        </p>
        <p class="text-sm text-gray-600">
            Check In: {{ $attendanceToday->waktu_masuk }} |
            Check Out: {{ $attendanceToday->waktu_keluar }}
        </p>

        @else
        <p class="mb-4 text-gray-700 font-semibold">
            Status: Belum Absen
        </p>

        <form action="{{ route('employee.attendance.checkin') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
                Check In
            </button>
        </form>
        @endif
    </div>

    <!-- Riwayat Absensi -->
    <h2 class="text-xl font-semibold mt-6 mb-3">Riwayat Absensi</h2>

    <div class="bg-white border rounded-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Check In</th>
                    <th class="p-3 text-left">Check Out</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($attendances as $a)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">
                        {{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->translatedFormat('d F Y') }}
                    </td>
                    <td class="p-3 border">{{ $a->waktu_masuk ?? '-' }}</td>
                    <td class="p-3 border">{{ $a->waktu_keluar ?? '-' }}</td>
                    <td class="p-3 border">
                        <span class="px-3 py-1 rounded-full text-sm
                            @if($a->status_absensi == 'hadir') bg-green-100 text-green-800
                            @elseif($a->status_absensi == 'sakit') bg-yellow-100 text-yellow-800
                            @elseif($a->status_absensi == 'izin') bg-blue-100 text-blue-800
                            @elseif($a->status_absensi == 'alpha') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ ucfirst($a->status_absensi) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Belum ada riwayat absensi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
