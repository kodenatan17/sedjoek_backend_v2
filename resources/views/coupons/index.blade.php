@extends('adminlte::page')

@section('title','List Coupons')

@section('content_header')
<h1 class="m-0 text-dark">List Coupons</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('coupons.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Coupon Type</th>
                            <th>Amount</th>
                            <th>Expiry Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key => $coupon )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$coupon->coupon_code}}</td>
                            <td>{{$coupon->coupon_type}}</td>
                            <td>
                                {{$coupon->amount}}
                                @if ($coupon->amount_type == "Percentage")
                                    %
                                @else
                                    INR
                                @endif
                            </td>
                            <td>{{$coupon->expiry_date}}</td>
                            <td>
                                <a href="{{route('coupons.edit', $coupon)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('coupons.destroy', $coupon)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Hapus
                                </a>
                                @if ($coupon->status == "1")
                                    <a class="couponStatus" href="{{ route('coupons.show', $coupon->id) }}"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                                @else
                                    <a class="couponStatus" href="{{ route('coupons.show', $coupon->id) }}"><i class="fas fa-toggle-on" aria-hidden="true" status="Inactive"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin menghapus data ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush
