<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\TransactionModel;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = TransactionModel::with('user', 'stock')->get();
        // dd($transaction);
        return view('transactions.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $stock = Stock::all();
        return view('transactions.create', compact('users', 'stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $array = $request->all();
        $transaction = TransactionModel::create($array);
        return redirect()->route('transactions.index')->with('success_message', 'Berhasil Menambahkan Transaksi Baru');
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
        $users = User::all();
        $stock = Stock::all();
        $transaction = TransactionModel::find($id);
        if (!$transaction) return redirect()->route('transactions.index')->with('error_message', 'Transaksi dengan id' . $id . 'tidak ditemukan');
        return view('transactions.edit', compact('users', 'transaction', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $transaction = TransactionModel::find($id);
        // $transaction->name = $request->name;
        $transaction->users_id = $request->users_id;
        $transaction->address = $request->address;
        // $transaction->payment = $request->payment;
        $transaction->total_price = $request->total_price;
        $transaction->shipping_price = $request->shipping_price;
        $transaction->status = $request->status;
        // dd($transaction);
        $transaction->save();
        return redirect()->route('transactions.index')->with('success_message', 'Berhasil mengubah Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = TransactionModel::find($id);
        if ($transaction) $transaction->delete();
        return redirect()->route('transactions.index')->with('success_message', 'Berhasil menghapus Transaksi');
    }
}
