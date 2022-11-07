<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Generate PDF From View</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table class="table table-hover table-bordered table-stripped" id="example2">
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