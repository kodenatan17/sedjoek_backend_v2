@extends('adminlte::page')
@section('title', 'Edit Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Karyawan</h1>
@stop
@section('content')
    <form action="{{route('employees.update', $employee)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class ="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="exampleInputName" placeholder="NIK" name="nik" value="{{ $employee->nik ?? old('nik')}}">
                        @error('nik') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Masukan Nama Lengkap" name="name" value="{{ $employee->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Pekerjaan</label>
                        <select name="jobs" class="form-control @error('jobs') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="SUPER ADMIN" {{$employee->jobs == 'SUPER ADMIN' ? 'selected' : ''}}>SUPER ADMIN</option>
                            <option value="ADMIN" {{$employee->jobs == 'ADMIN' ? 'selected' : ''}}>ADMIN</option>
                            <option value="MARKETING ADMIN" {{$employee->jobs == 'MARKETING ADMIN' ? 'selected' : ''}}>MARKETING</option>
                            <option value="WAREHOUSE ADMIN" {{$employee->jobs == 'WAREHOUSE ADMIN' ? 'selected' : ''}}>WAREHOUSE</option>
                            <option value="TECHNICIAN ADMIN" {{$employee->jobs == 'TECHNICIAN ADMIN' ? 'selected' : ''}}>TEKNISI</option>
                        </select>
                        @error('jobs') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">No Handphone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputName" placeholder="Masukan No Hp" name="phone" value="{{ $employee->phone ?? old('phone')}}">
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputName" placeholder="Masukan Alamat " name="address" value="{{ $employee->address ?? old('address')}}">
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('join_date') is-invalid @enderror" id="exampleInputName" placeholder="Masukan Tanggal Masuk " name="join_date" value="{{ $employee->join_date ?? old('join_date')}}">
                        @error('join_date') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('employees.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
