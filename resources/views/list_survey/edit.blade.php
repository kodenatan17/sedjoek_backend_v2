@extends('adminlte::page')
@section('title', 'Edit Survey')
@section('content_header')
<h1 class="m-0 text-dark">Edit Survey</h1>
@stop
@section('content')
<form action="{{route('list_survey.update', $survey)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama User</label>
                        <select name="users_id" class="form-control @error('users_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>
                            @foreach ($users as $user)
                            <option value= "{{$user->id}}" {{ $user->id == $survey->users_id ? 'selected' : '' }} >{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Produk</label>
                        <input type="text" class="form-control @error('transaction_stock_id') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Transaksi" name="transaction_stock_id" value="{{$survey->transaction_stock_id ?? old('transaction_stock_id')}}">
                        @error('transaction_stock_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Teknisi</label>
                        <input type="text" class="form-control @error('transaction_stock_id') is-invalid @enderror" id="exampleInputName" placeholder="Nama Teknisi" name="transaction_stock_id" value="{{$survey->transaction_stock_id ?? old('transaction_stock_id')}}">
                        @error('transaction_stock_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Alamat Survey</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Survey" name="address" value="{{$survey->address ?? old('address')}}">
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="SURVEY" {{$survey->status == 'SURVEY' ? 'selected' : ''}}>SURVEY</option>
                            <option value="INSTALLATION" {{$survey->status == 'INSTALLATION' ? 'selected' : ''}}>INSTALLATION</option>
                            <option value="FINISH" {{$survey->status == 'FINISH' ? 'selected' : ''}}>FINISH</option>
                        </select>
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('list_survey.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
