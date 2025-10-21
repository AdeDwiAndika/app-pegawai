<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Data Pegawai</title>
</head>

<body>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <label for="nama_lengkap">Nama Lengkap:</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>

        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea><br><br>

        <label for="tanggal_masuk">Tanggal Masuk:</label><br>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
        </select><br><br>

        <label for="departemen_id">Departemen:</label><br>
        <select id="departemen_id" name="departemen_id">
            <option value="1" {{ old('departemen_id') == 1 ? 'selected' : '' }}>DTIK</option>
            <option value="2" {{ old('departemen_id') == 2 ? 'selected' : '' }}>DTME</option>
        </select><br><br>

        <label for="jabatan_id">Position:</label><br>
        <select id="jabatan_id" name="jabatan_id">
            <option value="1" {{ old('jabatan_id') == 1 ? 'selected' : '' }}>Dosen</option>
            <option value="2" {{ old('jabatan_id') == 2 ? 'selected' : '' }}>Mahasiswa</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
