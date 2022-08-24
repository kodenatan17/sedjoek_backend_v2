@extends('adminlte::page')
@section('title', 'Tambah Banner')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Banner</h1>
@stop
@section('content')
<form action="{{route('banners.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Image Banners</label>
                        <input type="file" class="form-control @error('urlImages') is-invalid @enderror" id="exampleInputEmail" name="urlImages" value="{{old('urlImages')}}">
                        @error('urlImages') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('banners.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop