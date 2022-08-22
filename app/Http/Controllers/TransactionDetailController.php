<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionDetailRequest;
use App\Models\ProductModel;
use App\Models\TransactionDetailModel;
use App\Models\TransactionModel;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction_details = TransactionDetailModel::with('user', 'transaction', 'product')->get();
        return view('transaction_details.index', ['transaction_details' => $transaction_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction = TransactionModel::all();
        $product = ProductModel::all();
        $user = User::all();
        return view('transaction_details.create', compact('transaction', 'product', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionDetailRequest $request)
    {
        $array = $request->all();
        $transaction_detail = TransactionDetailModel::create($array);
        return redirect()->route('transaction_details.index')->with('success_message', 'Data Transaksi Detail berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction_detail = TransactionDetailModel::find($id);
        if (!$transaction_detail) return redirect()->route('transaction_details.index')->with('success_message', 'Transaction Detail dengan ' . $id . 'tidak ditemukan');
        return view('transaction_details.edit', ['transaction_detail' => $transaction_detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionDetailRequest $request, $id)
    {
        $transaction_detail = TransactionDetailModel::find($id)->all();
        $transaction_detail->update();
        return redirect()->route('transaction_details.index')->with('success_message','Berhasil mengubah transaksi detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetailRequest $request, $id)
    {
        $transaction_detail = TransactionDetailModel::find($id);
        if($transaction_detail) $transaction_detail->delete();
        return redirect()->route('transaction_details.index')->with('success_message','Berhasil menghapus data');
    }
}
