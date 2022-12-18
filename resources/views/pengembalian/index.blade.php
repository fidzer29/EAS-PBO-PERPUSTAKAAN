@extends('adminlte::page')

@section('title', 'List pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">List pengembalian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('pengembalian.create')}}" class="btn btn-primary mb-2">
                        Pengembalian Buku
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Member</th>
                            <th>Kode Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th> 
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengembalian as $key => $pengembalianya)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pengembalianya->Kode_Member}}</td>
                                <td>{{$pengembalianya->Kode_Buku}}</td>
                                <td>{{$pengembalianya->Tanggal_Pinjam}}</td>
                                <td>{{$pengembalianya->Tanggal_Kembali}}</td>
                                <td>
                                    <span class="badge badge-success p-2">
                                        DiKembalikan
                                    </span>
                                
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
