<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ url('navbar') }}">Back</a>
    <form action="{{ Route('volumeTabung.store') }}" method="POST">
        @csrf
        <p>phi : 3.14 </p>
        <label for="r">jari-jari</label>
        <input type="number" name="r" required><br>
        <label for="t">Tinggi</label>
        <input type="number" name="t" required><br>
        <button type="submit">Hitung</button>
    </form>
    @isset($hasil)
        <h3>Hasil : {{ $hasil }} </h3>
    @endisset
</body>

</html>
