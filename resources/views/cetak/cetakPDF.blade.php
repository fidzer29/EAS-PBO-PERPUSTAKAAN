<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN BUKU PERPUSTAKAAN 2022</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
    <center>
        <h1>{{ $title }}</h1>
    </center>
    <p>{{ $date }}</p>
    <table class="table table-bordered" id="example2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Buku</th>
                <th>Nama Buku</th>
                <th>Jumlah</th>
                <th>Masuk tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $key => $bukunya)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$bukunya->kode_buku}}</td>
                <td>{{$bukunya->nama_buku}}</td>
                <td>{{$bukunya->jumlah}}</td>
                <td>{{$bukunya->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>