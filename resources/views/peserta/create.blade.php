<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 30px;
    }

    h3 {
        text-align: center;
    }

    form {
        max-width: 900px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .col-md-6 {
        width: 48%;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input:focus,
    select:focus {
        border-color: #0d6efd;
        outline: none;
    }

    button {
        background-color: #0d6efd;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0b5ed7;
    }

    a {
        text-decoration: none;
        padding: 10px 18px;
        background: #6c757d;
        color: white;
        border-radius: 5px;
        margin-left: 10px;
    }

    a:hover {
        background: #5a6268;
    }
</style>

<body>
    <h3 class="mb-4">Tambah Peserta Pelatihan</h3>
    <form action="{{ route('peserta.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3"> <label class="form-label">Jurusan</label> <input type="text" name="jurusan"
                    class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Gelombang</label> <input type="text"
                    name="gelombang" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Nama Lengkap</label> <input type="text"
                    name="nama_lengkap" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">NIK</label> <input type="text" name="nik"
                    class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Kartu Keluarga</label> <input type="text"
                    name="kartu_keluarga" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Jenis Kelamin</label> <select name="jenis_kelamin"
                    class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Tempat Lahir</label> <input type="text"
                    name="tempat_lahir" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Tanggal Lahir</label> <input type="date"
                    name="tanggal_lahir" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Pendidikan Terakhir</label> <input type="text"
                    name="pendidikan_terakhir" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Nama Sekolah</label> <input type="text"
                    name="nama_sekolah" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Kejuruan</label> <input type="text" name="kejuruan"
                    class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Nomor HP</label> <input type="text" name="nomor_hp"
                    class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Email</label> <input type="email" name="email"
                    class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Aktivitas</label> <input type="text"
                    name="aktivitas" class="form-control"> </div>
            <div class="col-md-6 mb-3"> <label class="form-label">Status</label> <select name="status"
                    class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select> </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button> <a href="{{ route('peserta.index') }}"
            class="btn btn-secondary">Kembali</a>
    </form>
    </div>
</body>

</html>
