<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Belajar berhitung di laravel</h1>
    <nav>
        <a href="{{ route('perhitungan.index') }}">Perhitungan</a> |
        <a href="{{ route('luaspermukaankubus.index') }}">Luas Permukaan Kubus</a>|
        <a href="{{ route('volumekubus.index') }}">Volume Kubus</a>|
        <a href="">Luas Permukaan Tabung</a>|
        <a href="{{ route('volumetabung.index') }}">Volume Tabung</a>|
        <a href="{{ route('volumelimas.index') }}">Volume Limas Segiempat</a>
        <a href="{{ route('peserta.index') }}">Peserta</a>
    </nav>
</body>

</html>
