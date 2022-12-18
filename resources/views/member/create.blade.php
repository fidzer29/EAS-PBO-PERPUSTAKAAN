@extends('adminlte::page')

@section('title', 'Tambah Member')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Member</h1>
@stop

@section('content')
<form action="{{route('member.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="form-group">
                            <label for="exampleInputName">Kode Member</label>
                            <input type="text" class="form-control @error('Kode_Member') is-invalid @enderror" id="exampleInputName" placeholder="Kode Member" name="Kode_Member" value="{{old('Kode_Member')}}">
                    @error('Kode_Member')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="exampleInputName">Nama Lengkap</label>
                    <input type="text" class="form-control @error('Nama_Lengkap') is-invalid @enderror" id="exampleInputName" placeholder="Nama Lengkap" name="Nama_Lengkap" value="{{old('Nama_Lengkap')}}">
                    @error('Nama_Lengkap')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Alamat</label>
                    <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="exampleInputName" placeholder="Alamat" name="Alamat" value="{{old('Alamat')}}">
                    @error('Alamat')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName">No Telepon</label>
                    <input type="text" class="form-control @error('No_Telepon') is-invalid @enderror" id="exampleInputName" placeholder="No Telepon" name="No_Telepon" value="{{old('No_Telepon')}}">
                    @error('No_Telepon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Status</label>
                    <select type="text" class="form-control @error('Status') is-invalid @enderror" id="exampleInputName" placeholder="Status" name="Status" value="{{old('Status')}}">
                        <option value='Aktif'>Aktif</option>
                        <option value='Tidak Aktif'>Tidak Aktif</option>
                    </select>
                    @error('Status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('member.index')}}" class="btn btn-default">
                    Batal
                </a>
            </div>
        </div>
    </div>
    </div>
    @stop