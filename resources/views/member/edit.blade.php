@extends('adminlte::page')

@section('title', 'Edit Member')

@section('content_header')
<h1 class="m-0 text-dark">Edit Member</h1>
@stop

@section('content')
<form action="{{route('member.update', $member)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Lengkap</label>
                        <input type="text" class="form-control @error('Nama_Lengkap') is-invalid @enderror" id="exampleInputName" placeholder="Nama Lengkap" name="Nama_Lengkap" value="{{$buku->Nama_Lengkap ?? old('Nama_Lengkap')}}">
                        @error('Nama_Lengkap') <span class="text-danger">{{$message}}</span> @enderror
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