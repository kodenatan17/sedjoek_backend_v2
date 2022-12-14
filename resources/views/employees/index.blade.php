@extends('adminlte::page')

@section('title', 'List Karyawan')

@section('content_header')
    <h1 class="m-0 text-dark">List Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Pekerjaan</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $key => $employee)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $employee->nik }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->jobs }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ date('d F Y', strtotime($employee->join_date)) }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>

                                        <a href="{{ route('employees.destroy', $employee) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Hapus
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
        @method('DELETE')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin menghapus data ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
