@extends('admin')
@section('title', 'Salary')
@section('page-title', 'List Gaji')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Alert -->
    @if (session('success'))
    <div class="mb-6 p-4 rounded-xl bg-green-500/20 text-green-400 border border-green-500/50 backdrop-blur-lg">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-gray-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    Daftar Gaji
                    <span class="text-sm font-normal text-gray-400">({{ $salaries->total() }} Gaji)</span>
                </h3>
                <!-- @if(request()->filled('search'))
                <p class="text-sm text-gray-400 mt-1">
                    Hasil pencarian untuk "<span class="text-blue-400">{{ request()->input('search') }}</span>"
                    - {{ $salaries->total() }} Absensi ditemukan
                </p>
                @endif -->
            </div>
            <div class="flex gap-3">
                <a href="{{ route('salaries.create') }}"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-900 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 transition-all text-white">
                    <i class="fas fa-plus mr-2"></i>Tambah Gaji
                </a>
            </div>
        </div>

        <div class="overflow-x-auto bg-gray-900/80 border border-white/10 rounded-xl shadow">
            <table class="min-w-full text-sm text-gray-300">
                <thead class="bg-gray-800/50 border-b border-white/10">
                    <tr>
                        <th class="py-3 px-4 ">ID</th>
                        <th class="py-3 px-4 ">Karyawan</th>
                        <th class="py-3 px-4 ">Bulan</th>
                        <th class="py-3 px-4 ">Gaji Pokok</th>
                        <th class="py-3 px-4 ">Tunjangan</th>
                        <th class="py-3 px-4 ">Potongan</th>
                        <th class="py-3 px-4 ">Total Gaji</th>
                        <th class="py-3 px-4 ">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salaries as $salary)
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="py-3 px-4 text-center space-x-3">{{ $salary->id }}</td>
                        <td class="py-3 px-4 text-center space-x-3">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                        <td class="py-3 px-4 text-center space-x-3">{{ $salary->bulan }}</td>
                        <td class="py-3 px-4 text-center space-x-3">
                            Rp{{ number_format($salary->gaji_pokok, 2, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center space-x-3">
                            Rp{{ number_format($salary->tunjangan, 2, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center space-x-3">
                            Rp{{ number_format($salary->potongan, 2, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center space-x-3">
                            Rp{{ number_format($salary->total_gaji, 2, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center space-x-3">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('salaries.show', $salary->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('salaries.edit', $salary->id) }}"
                                    class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition-all"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus departemen ini?')"
                                        class="px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500/30 transition-all"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada data gaji</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $salaries->links('vendor.pagination.tailwind') }}
    </div>

</div>



@endsection