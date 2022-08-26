<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\TransactionModel;
use App\Models\UserDetailModel;
use App\Models\User;
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
        $transaction = TransactionModel::with('user')->get();
        return view('transactions.index', ['transaction' => $transaction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('transactions.create', compact('users'));
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
        $transaction = TransactionModel::find($id);
        if (!$transaction) return redirect()->route('transactions.index')->with('error_message', 'Transaksi dengan id' . $id . 'tidak ditemukan');
        return view('transactions.edit', ['transaction' => $transaction]);
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
        $transaction = TransactionModel::find($id)->all();
        $transaction->save();
        return redirect()->route('transactions.index')->with('success_message', 'Berhasil mengubah Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionRequest $request, $id)
    {
        $transaction = TransactionModel::find($id);
        if ($transaction) $transaction->delete();
        return redirect()->route('transactions.index')->with('success_message', 'Berhasil menghapus Transaksi');
    }
}
