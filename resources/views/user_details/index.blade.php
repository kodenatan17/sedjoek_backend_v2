@extends('adminlte::page')

@section('title','List User Detail')

@section('content_header')
<h1 class="m-0 text-dark">Detail User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->roles == "ADMIN")
                        <a href="{{route('user_details.create')}}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endif
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Full Name</th>
                            <th>KTP</th>
                            <th>Alamat KTP</th>
                            <th>Alamat Rumah</th>
                            <th>Profesi</th>
                            <th>Hp Keluarga</th>
                            <th>Nama Keluarga</th>
                            <th>Relasi Keluarga</th>
                            <th>Nama Darurat</th>
                            <th>Alamat Darurat</th>
                            <th>KTP</th>
                            <th>KK</th>
                            @if(Auth::user()->roles == "ADMIN")
                                <th>Option</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_details as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->user['nama']}}</td>
                                <td>{{$user->name_full}}</td>
                                <td>{{$user->ktp}}</td>
                                <td>{{$user->ktp_address}}</td>
                                <td>{{$user->status_residence}}</td>
                                <td>{{$user->profession}}</td>
                                <td>{{$user->closest_family_phone}}</td>
                                <td>{{$user->closest_family_name}}</td>
                                <td>{{$user->closest_family_relation}}</td>
                                <td>{{$user->emergency_name}}</td>
                                <td>{{$user->emergency_address}}</td>
                                <td><img src = "/temp_ktp/ {{$user->image_ktp}}" width="100px"></td>
                                <td><img src = "/temp_kk/ {{$user->image_kk}}" width="100px"></td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <td>
                                        <a href="{{route('user_details.edit', $user)}}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{route('user_details.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                @endif
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
