@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Peminjaman</h1>
@stop

@section('content')
    <form action="{{route('peminjaman.update', $peminjaman)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Pinjam</label>
                            <input type="text" class="form-control @error('Tanggal_Pinjam') is-invalid @enderror" id="exampleInputName" placeholder="Tanggal Pinjam" name="Tanggal_Pinjam" value="{{$peminjaman->Tanggal_Pinjam ?? old('Tanggal_Pinjam')}}">
                            @error('Tanggal_Pinjam') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Kembali</label>
                            <input type="text" class="form-control @error('Tanggal_Kembali') is-invalid @enderror" id="exampleInputName" placeholder="Tanggal Kembali" name="Tanggal_Kembali" value="{{$peminjaman->Tanggal_Kembali ?? old('Tanggal_Kembali')}}">
                            @error('Tanggal_Kembali') <span class="text-danger">{{$message}}</span> @enderror
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
@stop