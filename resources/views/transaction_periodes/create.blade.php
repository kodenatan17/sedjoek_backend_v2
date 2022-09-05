@extends('adminlte::page')
@section('title', 'Tambah Transaksi Periode')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Transaksi Periode</h1>
@stop
@section('content')
<form action="{{route('transaction_periodes.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">id</label>
                        <select name="transaction_id" class="form-control @error('transaction_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>
                            @foreach ($transaction_details as $user)
                                <option value="{{$user->id}}">{{$user->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Mulai Pemasangan</label>
                        <input type="date" class="form-control @error('started_at') is-invalid @enderror" id="exampleInputName" placeholder="Konten Artikel" name="started_at" value="{{old('title')}}">
                        @error('started_at') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('transaction_periodes.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
