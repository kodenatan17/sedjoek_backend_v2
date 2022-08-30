<?php

namespace App\Http\Controllers;

use App\Models\CouponModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = CouponModel::get();
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductModel::all();
        return view('coupons.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->all();
        $coupon = CouponModel::create($array);
        return redirect()->route('coupons.index')->with('success_message', 'Berhasil menambahkan coupon Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getStatus = CouponModel::select('status')->where('id', $id)->first();
        if($getStatus['status']==1){
            $status = 0;
        }else{
            $status = 1;
        }
        CouponModel::where('id', $id)->update(['status'=>$status]);
        return redirect()->back()->with('success_message', 'Berhasil Mengubah Status Baru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = CouponModel::find($id);
        if (!$coupon) return redirect()->route('coupons.index')->with('error_message', 'coupon dengan id' . $id . 'tidak ditemukan');
        return view('coupons.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = CouponModel::find($id)->all();
        $coupon->coupon_option = $request->coupon_option;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->categories = $request->categories;
        $coupon->users = $request->users;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->amount_type = $request->amount_type;
        $coupon->amount = $request->amount;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->status;
        $coupon->save();
        return redirect()->route('coupons.index')->with('success_message', 'Berhasil mengubah coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = CouponModel::find($id);
        if ($coupon) $coupon->delete();
        return redirect()->route('coupons.index')->with('success_message', 'Berhasil menghapus coupon');
    }

}
