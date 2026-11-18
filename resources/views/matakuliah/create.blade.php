<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
</head>
<body>

    <h1>Tambah Data Mata Kuliah</h1>

    <a href="{{ route('matakuliah.index') }}">
        Kembali ke Daftar Mata Kuliah
    </a>

    <br><br>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Mata Kuliah</label><br>
            <input
                type="text"
                id="nama_matakuliah"
                name="nama_matakuliah"
                value="{{ old('nama_matakuliah') }}"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div>
            <label>Kode Mata Kuliah (Otomatis)</label><br>
            <input
                type="text"
                id="kode_matakuliah"
                name="kode_matakuliah"
                value="{{ old('kode_matakuliah') }}"
                maxlength="20"
                readonly
                required
            >
        </div>

        <br>

        <div>
            <label>Jumlah SKS</label><br>
            <input
                type="number"
                name="sks"
                value="{{ old('sks') }}"
                min="1"
                max="6"
                required
            >
        </div>

        <br>

        <button type="submit">Simpan Data</button>

    </form>

    <script>
        const namaInput = document.getElementById('nama_matakuliah');
        const kodeInput = document.getElementById('kode_matakuliah');

        function buatKode(nama) {
            return nama
                .trim()
                .split(/\s+/)
                .filter(kata => kata.length > 0)
                .map(kata => kata[0].toUpperCase())
                .join('');
        }

        namaInput.addEventListener('input', function () {
            kodeInput.value = buatKode(this.value);
        });

        if (namaInput.value) {
            kodeInput.value = buatKode(namaInput.value);
        }
    </script>

</body>
</html>
