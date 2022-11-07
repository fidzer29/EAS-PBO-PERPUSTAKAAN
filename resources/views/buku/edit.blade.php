@extends('adminlte::page')

@section('title', 'Edit Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Buku</h1>
@stop

@section('content')
    <form action="{{route('buku.update', $buku)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama Buku</label>
                            <input type="text" class="form-control @error('nama_buku') is-invalid @enderror" id="exampleInputName" placeholder="Nama Buku" name="nama_buku" value="{{$buku->nama_buku ?? old('nama_buku')}}">
                            @error('nama_buku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Jumlah Buku</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="exampleInputName" placeholder="Nama Buku" name="jumlah" value="{{$buku->jumlah ?? old('jumlah')}}">
                            @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('buku.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
