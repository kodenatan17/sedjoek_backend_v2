@extends('adminlte::page')
@section('title', 'Tambah User Details')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User Details</h1>
@stop
@section('content')
<form action="{{route('user_details.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name_full') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name_full" value="{{old('name_full')}}">
                        @error('name_full') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">User ID</label>
                        <input type="text" class="form-control @error('users_id') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan User ID" name="users_id" value="{{old('users_id')}}">
                        @error('users_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">KTP</label>
                        <input type="text" class="form-control @error('ktp') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan KTP" name="ktp" value="{{old('ktp')}}">
                        @error('ktp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat KTP</label>
                        <input type="text" class="form-control @error('ktp_address') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Alamat KTP" name="ktp_address" value="{{old('ktp_address')}}">
                        @error('ktp_address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat Rumah</label>
                        <input type="text" class="form-control @error('home_address') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Alamat Rumah" name="home_address" value="{{old('home_address')}}">
                        @error('home_address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Profesi</label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Profession" name="profession" value="{{old('profession')}}">
                        @error('profession') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">HP Keluarga Terdekat</label>
                        <input type="text" class="form-control @error('closest_family_phone') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan HP Keluarga Terdekat" name="closest_family_phone" value="{{old('closest_family_phone')}}">
                        @error('closest_family_phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Keluarga Terdekat</label>
                        <input type="text" class="form-control @error('closest_family_name') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Nama Keluarga Terdekat" name="closest_family_name" value="{{old('closest_family_name')}}">
                        @error('closest_family_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hubungan Keluarga Terdekat</label>
                        <input type="text" class="form-control @error('closest_family_relation') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Hubungan Keluarga Terdekat" name="closest_family_relation" value="{{old('closest_family_relation')}}">
                        @error('closest_family_relation') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Keluarga (Darurat)</label>
                        <input type="text" class="form-control @error('emergency_surename') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Nama Keluarga (Darurat)" name="emergency_surename" value="{{old('emergency_surename')}}">
                        @error('emergency_surename') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat Kelurga (Darurat)</label>
                        <input type="text" class="form-control @error('emergency_address') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Alamat Keluarga (Darurat)" name="emergency_address" value="{{old('emergency_address')}}">
                        @error('emergency_address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Upload Foto KTP</label>
                        <input type="file" class="form-control @error('image_ktp') is-invalid @enderror" id="exampleInputEmail" name="image_ktp" value="{{old('image_ktp')}}">
                        @error('image_ktp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Upload Foto KK</label>
                        <input type="file" class="form-control @error('image_kk') is-invalid @enderror" id="exampleInputEmail" name="image_kk" value="{{old('image_kk')}}">
                        @error('image_kk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('user_details.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop