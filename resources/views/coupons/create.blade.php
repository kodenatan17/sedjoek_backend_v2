@extends('adminlte::page')
@section('title', 'Tambah Coupon')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Coupon</h1>
@stop
@section('content')
<form action="{{route('coupons.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Pilih Kupon</label>
                        <br>
                        <span><input type="radio" name="coupon_option" id="" value="Automatic">Automatic</span>
                        <span><input type="radio" name="coupon_option" id="" value="Manual">Manual</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Kode Kupon</label>
                        <input type="text" class="form-control @error('coupon_code') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Transaksi" name="coupon_code" value="{{old('coupon_code')}}">
                        @error('coupon_code') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('coupons.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
