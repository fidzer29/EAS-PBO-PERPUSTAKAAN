@extends('adminlte::page')

@section('title', 'List Member')

@section('content_header')
<h1 class="m-0 text-dark"><strong>LIST MEMBER</strong></h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{route('member.create')}}" class="btn btn-success mb-2">
                    <span class="fas fa-plus"></span>
                </a>

                <a href="{{route('pdf.create')}}" class="btn btn-secondary mb-2">
                    <span class="fas fa-print"></span>
                </a>

                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Member</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Status</th>
                            <th>Masuk Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Member as $key => $Membernya)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$Membernya->Kode_Member}}</td>
                            <td>{{$Membernya->Nama_Lengkap}}</td>
                            <td>{{$Membernya->Alamat}}</td>
                            <td>{{$Membernya->No_Telepon}}</td>
                            <td>{{$Membernya->Status}}</td>
                            <td>{{$Membernya->created_at}}</td>
                            <td>
                                <a href="{{route('member.edit', $Membernya->Kode_Member)}}" class="btn btn-primary">
                                    <span class="fas fa-pencil-alt"></span>
                                </a>
                                <a href="{{route('member.destroy', $Membernya->Kode_Member)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger">
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