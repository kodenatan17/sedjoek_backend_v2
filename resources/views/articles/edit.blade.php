@extends('adminlte::page')
@section('title', 'Edit Artikel')
@section('content_header')
<h1 class="m-0 text-dark">Edit Artikel</h1>
@stop
@section('content')
    <form action="{{route('article.update', $article)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class ="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for ="exampleInputName">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputName" placeholder="Judul Artikel" name="title" value="{{$article->title ?? old('title')}}">
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Content Article</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="exampleInputContent" placeholder="Konten Artikel" name="content" value="{{$article->content ?? old('content')}}" rows="4">
                        @error('content') <span class="text-danger">{{$message}}</span> @enderror                            
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Created by</label>
                        <input type="text" class="form-control @error('created_by') is-invalid @enderror" id="exampleInputName" placeholder="Dibuat Oleh" name="created_by" value="{{$article->created_by ?? old('created_by')}}">
                        @error('created_by') <span class="text-danger">{{$message}}</span> @enderror                            
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Type Article</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="exampleInputName" placeholder="Tipe Artikel" name="type" value="{{$article->type ?? old('type')}}">
                        @error('type') <span class="text-danger">{{$message}}</span> @enderror                            
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('article.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop