<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit');
        $coupon_option = $request->input('coupon_option');
        $coupon_code = $request->input('coupon_code');
        $categories = $request->input('categories');
        $users = $request->input('users');
        $coupon_type = $request->input('coupon_type');
        $amount_type = $request->input('amount_type');
        $expiry_date = $request->input('expiry_date');
        $status = $request->input('status');

        // if($id){
        //     $coupon = BrandModel::with([])
        // }
    }
}
