@extends('adminlte::page')

@section('title', 'Tambah Peminjaman')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Peminjaman</h1>
@stop

@section('content')
    <form action="{{route('peminjaman.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Kode Member</label>
                            <input type="text" class="form-control @error('Kode_Member') is-invalid @enderror" id="exampleInputName" placeholder="Kode Member" name="Kode_Member" value="{{old('Kode_Member')}}">
                            @error('Kode_Member') 
                                <span class="text-danger">{{$message}}</span> 
                            @enderror
                        </div>
                            <div id="reader" width="600px"></div>
                        <div class="form-group">
                            <label for="exampleInputName">Kode Buku</label>
                            <input type="text" class="form-control @error('Kode_Buku') is-invalid @enderror" id="result" placeholder="Kode Buku" name="Kode_Buku" value="{{old('Kode_Buku')}}">
                            @error('Kode_Buku') 
                                <span class="text-danger">{{$message}}</span> 
                            @enderror
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('Tanggal_Pinjam') is-invalid @enderror" id="exampleInputName" placeholder="Tanggal Pinjam" name="Tanggal_Pinjam" value="{{old('Tanggal_Pinjam')}}">
                            @error('Tanggal_Pinjam') 
                                <span class="text-danger">{{$message}}</span> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('Tanggal_Kembali') is-invalid @enderror" id="exampleInputName" placeholder="Tanggal Kembali" name="Tanggal_Kembali" value="{{old('Tanggal_Kembali')}}">
                            @error('Tanggal_Kembali') 
                                <span class="text-danger">{{$message}}</span> 
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('peminjaman.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script>
            function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
//   console.log(`Code matched = ${decodedText}`, decodedResult);
  $("#result").val(decodedText);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </script>
@stop