@extends('adminlte::page')
@section('title', 'Tambah Karyawan')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Karyawan</h1>
@stop
@section('content')
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                id="exampleInputName" placeholder="NIK" name="nik" value="{{ old('nik') }}">
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputName" placeholder="Masukan Nama Lengkap" name="name"
                                value="{{ old('title') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Pekerjaan</label>
                            <select name="jobs" class="form-control @error('jobs') is-invalid @enderror"
                                id="exampleInputName">
                                <option disabled>------</option>
                                <option value="SUPER ADMIN">SUPER ADMIN</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="SUPER ADMIN">SUPER ADMIN</option>
                                <option value="MARKETING ADMIN">MARKETING</option>
                                <option value="WAREHOUSE ADMIN">WAREHOUSE</option>
                                <option value="TECHNICIAN ADMIN">TEKNISI</option>
                            </select>
                            @error('jobs')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">No Handphone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="exampleInputName" placeholder="Masukan No Hp" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Alamat</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="exampleInputName" placeholder="Masukan Alamat " name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Masuk</label>
                            <input type="date" class="form-control @error('join_date') is-invalid @enderror"
                                id="exampleInputName" placeholder="Masukan Tanggal Masuk " name="join_date"
                                value="{{ old('join_date') }}">
                            @error('join_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
