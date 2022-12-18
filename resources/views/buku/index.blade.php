@extends('adminlte::page')

@section('title', 'List Buku')

@section('content_header')
<h1 class="m-0 text-dark"><strong>LIST BUKU PERPUSTAKAAN</strong></h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('buku.create')}}" class="btn btn-success mb-2">
                    <span class="fas fa-plus"></span>
                </a>
                <a href="{{route('emailsend')}}" class="btn btn-warning mb-2">
                    <span class="fas fa-envelope"></span>
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Jumlah</th>
                            <th>Masuk tanggal</th>
                            <th>Opsi</th>
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
                            <td>
                                <a href="{{route('buku.edit', $bukunya)}}" class="btn btn-primary">
                                    <span class="fas fa-pencil-alt"></span>
                                </a>
                                <a href="{{route('buku.destroy', $bukunya->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger">
                                    <span class="fas fa-trash-alt"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush