@extends('adminlte::page')
@section('title', 'Tambah Events')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Events</h1>
@stop
@section('content')
    <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputName" placeholder="Masukan Judul Events" name="title" value="{{old('title')}}">
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Content</label>
                        <input type="text" class="form-control @error('content') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Isi Content" name="content" value="{{old('content')}}">
                        @error('content') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">URL</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan URL" name="url" value="{{old('url')}}">
                        @error('url') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Created By</label>
                        <input type="text" class="form-control @error('created_by') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Creator" name="created_by" value="{{old('created_by')}}">
                        @error('created_by') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Upload Foto Content</label>
                        <input type="file" class="form-control @error('urlImages') is-invalid @enderror" id="exampleInputEmail" name="urlImages" value="{{old('urlImages')}}">
                        @error('urlImages') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('events.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop