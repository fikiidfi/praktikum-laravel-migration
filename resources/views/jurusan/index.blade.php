
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jurusan</title>
</head>
<body>

    <h1>Data Jurusan</h1>

    {{-- Menampilkan pesan berhasil --}}
    @if (session('success'))
        <p style="color:green">
            {{ session('success') }}
        </p>
    @endif

    {{-- Link untuk menambah jurusan --}}
    <a href="{{ route('jurusan.create') }}">
        Tambah Jurusan
    </a>

    {{-- Tabel daftar jurusan --}}
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Jurusan</th>
            </tr>
        </thead>

        <tbody>
            {{-- Menampilkan seluruh data jurusan --}}
            @forelse ($jurusans as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->kode }}</td>
                    <td>{{ $j->nama }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        Belum ada data jurusan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
