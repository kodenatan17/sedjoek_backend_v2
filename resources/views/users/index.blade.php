@extends('adminlte::page')

@section('title','List User')

@section('content_header')
<h1 class="m-0 text-dark">List User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->roles == "ADMIN")
                        <a href="{{route('users.create')}}" class="btn btn-primary mb-2">
                            Tambah
                        </a>
                    @endif
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Roles</th>
                            @if(Auth::user()->roles == "ADMIN")
                                <th>Option</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->employee_id !== null ? $user->employee->nik : '-' }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles !== null ? $user->roles : 'USER'}}</td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <td>
                                        <a href="{{route('users.edit', $user)}}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
