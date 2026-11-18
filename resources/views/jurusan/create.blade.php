<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jurusan</title>
</head>
<body>
    <h1>Tambah Data Jurusan</h1>

    {{-- Form untuk mengirim data jurusan --}}
    <form action="{{ route('jurusan.store') }}" method="POST">
        {{-- Token keamanan CSRF --}}
        @csrf

        <div>
            {{-- Input kode jurusan --}}
            <label>Kode Jurusan</label>
            <input type="text" id="kode" name="kode"
                value="{{ old('kode') }}" readonly>

            {{-- Menampilkan pesan kesalahan kode --}}
            @error('kode')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            {{-- Input nama jurusan --}}
            <label>Nama Jurusan</label>
            <input type="text" id="nama" name="nama"
                value="{{ old('nama') }}">

            {{-- Menampilkan pesan kesalahan nama --}}
            @error('nama')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol untuk menyimpan data --}}
        <button type="submit">Simpan</button>

        {{-- Link kembali ke halaman daftar jurusan --}}
        <a href="{{ route('jurusan.index') }}">Kembali</a>
    </form>

    <script>
    // Membuat kode jurusan secara otomatis
    const nama = document.getElementById('nama');
    const kode = document.getElementById('kode');

    nama.addEventListener('input', function () {
        let kata = this.value.trim().split(/\s+/);

        if (this.value.trim() === '') {
            kode.value = '';
        } else if (kata.length === 1) {
            kode.value = kata[0].substring(0, 2).toUpperCase();
        } else {
            kode.value = kata.slice(0, 2)
                .map(k => k.charAt(0).toUpperCase())
                .join('');
        }
    });
</script>
</body>
</html>