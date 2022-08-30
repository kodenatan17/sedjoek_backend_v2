@extends('adminlte::page')
@section('title', 'Edit Kupon')
@section('content_header')
<h1 class="m-0 text-dark">Edit Kupon</h1>
@stop
@section('content')
<form action="{{route('coupons.update', $coupons->id)}}" method="post">
    {{@method_field('PUT')}}
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Pilih Kupon</label>
                        <br>
                        <span class="mr-2"><input type="radio" name="coupon_option" id="manualCoupon" value="Manual" {{ $coupons->coupon_option == 'Manual' ? 'checked' : '' }}>Manual</span>
                        <span><input type="radio" name="coupon_option" id="automaticCoupon" value="Automatic" {{ $coupons->coupon_option == 'Automatic' ? 'checked' : '' }} >Otomatis</span>
                    </div>
                    <div class="form-group" id="couponField">
                        <label for="exampleInputName">Kode Kupon</label>
                        <input type="text" class="form-control @error('coupon_code') is-invalid @enderror"
                            id="exampleInputName" placeholder="Kode Kupon" name="coupon_code"
                            value="{{$coupons->coupon_code ?? old('coupon_code') }}">
                        @error('coupon_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Jenis Kupon</label>
                        <br>
                        <span class="mr-2"><input type="radio" name="coupon_type" id="" value="Multiple Times" {{ $coupons->coupon_type == 'Multiple Times' ? 'checked' : '' }}>Beberapa Kali Pakai</span>
                        <span><input type="radio" name="coupon_type" id="" value="Single Times" {{ $coupons->coupon_type == 'Single Times' ? 'checked' : '' }} >Sekali Pakai</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Jenis Jumlah</label>
                        <br>
                        <span class="mr-2"><input type="radio" name="amount_type" id="" value="Percentage" {{ $coupons->amount_type == 'Percentage' ? 'checked' : '' }} >Persentase (%)</span>
                        <span><input type="radio" name="amount_type" id="" value="Fixed" {{ $coupons->amount_type == 'Fixed' ? 'checked' : '' }} >Tetap (INR atau IDR)</span>
                    </div>
                    <div class="form-group" id="couponField">
                        <label for="exampleInputName">Jumlah</label>
                        <input type="text" class="form-control @error('amount') is-invalid @enderror"
                            id="exampleInputName" placeholder="Jumlah" name="amount"
                            value="{{$coupons->amount ?? old('amount') }}">
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Product</label><br>
                        <select name="categories"
                            class="form-control @error('categories') is-invalid @enderror"
                            id="exampleInputName">
                            <option disabled>---</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $coupons->categories ? 'selected' : '' }} >{{ $product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama User</label>
                        <select name="users" class="form-control @error('users') is-invalid @enderror" id="exampleInputName">
                            <option disabled>---</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->email}}" {{ $user->email == $coupons->users ? 'selected' : '' }} >{{ $user->email}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control @error('expiry_date') is-invalid @enderror"
                            id="exampleInputName" placeholder="Masukan Tanggal Kadaluarsa" name="expiry_date"
                            value="{{$coupons->expiry_date ?? old('expiry_date') }}">
                        @error('expiry_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
    @push('js')
        <script>
            $('#manualCoupon').click(function() {
                $('#couponField').show();
            });
            $('#automaticCoupon').click(function() {
                $('#couponField').hide();
            });
        </script>
        $('.selectpicker').selectpicker();
        <script type="text/javascript" src="{{ asset('vendor/select/js/bootstrap-select.min.js') }}"></script>
    @endpush
    @push('css')
        <link href="{{ asset('vendor/select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    @endpush
