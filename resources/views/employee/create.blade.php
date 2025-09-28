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

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
