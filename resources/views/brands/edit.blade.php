@extends('adminlte::page')
@section('title', 'Edit Brand')
@section('content_header')
<h1 class="m-0 text-dark">Edit Brand</h1>
@stop
@section('content')
<form action="{{route('brands.update', $brand)}}" method="post">
    {{@method_field('PUT')}}
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Brand Article</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Brand" name="name" value="{{$brand->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('brands.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

