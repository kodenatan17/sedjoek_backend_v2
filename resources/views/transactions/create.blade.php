@extends('adminlte::page')
@section('title', 'Tambah Transaction')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Transaksi</h1>
@stop
@section('content')
<form action="{{route('transactions.store')}}" method="post">
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
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Transaksi" name="address" value="{{old('address')}}">
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga transaksi</label>
                        <input type="text" class="form-control @error('total_price') is-invalid @enderror" id="exampleInputName" placeholder="Total Transaksi" name="total_price" value="{{old('total_price')}}">
                        @error('total_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga pengiriman</label>
                        <input type="text" class="form-control @error('shipping_price') is-invalid @enderror" id="exampleInputName" placeholder="Harga Pengiriman" name="shipping_price" value="{{old('shipping_price')}}">
                        @error('shipping_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Status Transaksi</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="{{old('status')}}">SHIPPED</option>
                            <option value="{{old('status')}}">SHIPPING</option>
                            <option value="{{old('status')}}">PROCESSING</option>
                            <option value="{{old('status')}}">PENDING</option>
                            <option value="{{old('status')}}">CANCEL</option>
                        </select>
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('transactions.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
