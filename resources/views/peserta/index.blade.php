<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Peserta Pelatihan</h1>

    <a href="{{ route('peserta.create') }}" class="btn btn-primary mb-2 ms-2">Tambahkan Peserta</a>

    <div class="card">
        <table class="table">
            <thead class="table-dark">
                <tr class="text center fw-bold">
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Gelombang</th>
                    <th>Nama lengkap</th>
                    <th>NIK</th>
                    <th>kartu keluarga</th>
                    <th>jenis kelamin</th>
                    <th>tempat lahir</th>
                    <th>tanggal lahir</th>
                    <th>pendidikan terakhir</th>
                    <th>nama sekolah</th>
                    <th>kejuruan</th>
                    <th>nomor hp</th>
                    <th>email</th>
                    <th>aktivitas</th>
                    <th>status</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            @foreach ($peserta as $index => $value)
                <tbody class="text-center">
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $value->jurusan }}</td>
                        <td>{{ $value->gelombang }}</td>
                        <td>{{ $value->nama_lengkap }}</td>
                        <td>{{ $value->nik }}</td>
                        <td>{{ $value->kartu_keluarga }}</td>
                        <td>{{ $value->jenis_kelamin }}</td>
                        <td>{{ $value->tempat_lahir }}</td>
                        <td>{{ $value->tanggal_lahir }}</td>
                        <td>{{ $value->pendidikan_terakhir }}</td>
                        <td>{{ $value->nama_sekolah }}</td>
                        <td>{{ $value->kejuruan }}</td>
                        <td>{{ $value->nomor_hp }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->aktivitas }}</td>
                        <td>{{ $value->status }}</td>
                        <td>
                            <a href="{{ route('peserta.edit', $value->id) }}" class="">Edit</a>
                            <form action="{{ route('peserta.destroy', $value->id) }}" method="post"
                                onclick="return confirm('Yakin ingin dihapus?')" ">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
 @endforeach
                </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
