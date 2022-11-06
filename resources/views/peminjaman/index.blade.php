@extends('adminlte::page')

@section('title', 'List peminjaman')

@section('content_header')
    <h1 class="m-0 text-dark">List peminjaman</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('peminjaman.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pinjam</th>
                            <th>Kode Member</th>
                            <th>Kode Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peminjaman as $key => $peminjamannya)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$peminjamannya->Kode_Pemin}}</td>
                                <td>{{$peminjamannya->Kode_Member}}</td>
                                <td>{{$peminjamannya->Kode_Buku}}</td>
                                <td>{{$peminjamannya->Tanggal_Pinjam}}</td>
                                <td>{{$peminjamannya->Tanggal_Kembali}}</td>                              
                                <td>
                                    <a href="{{route('peminjaman.edit', $peminjamannya)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('peminjaman.destroy', $peminjamannya)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
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
