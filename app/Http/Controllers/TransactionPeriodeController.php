<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionPeriodeRequest;
use App\Models\TransactionDetailModel;
use App\Models\TransactionPeriodeModel;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = TransactionPeriodeModel::with('transaction_details')->get();
        return view('transaction_periodes.index', ['periode' => $periode]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction_details = TransactionDetailModel::all();
        return view('transaction_periodes.create', compact('transaction_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionPeriodeRequest $request)
    {
        $array = $request->all();
        $periode = TransactionPeriodeModel::create($array);
        return redirect()->route('transaction_periodes.index')->with('success_message', 'Data berhasil ditambahkan');
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
        $periode = TransactionPeriodeModel::find($id);
        if (!$periode) return redirect()->route('transaction_periodes.index')->with('error_message', 'Periode Transaksi dengan id ' . $id . 'tidak ditemukan');
        return view('transaction_periodes.index', ['periode' => $periode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionPeriodeRequest $request, $id)
    {
        $periode = TransactionPeriodeModel::find($id)->all();
        $periode->save();
        return redirect()->route('transaction_periodes.index')->with('success_message', 'Data dengan id' . $id . 'berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionPeriodeRequest $request, $id)
    {
        $periode = TransactionPeriodeModel::find($id);
        if ($periode) $periode->delete();
        return redirect()->route('transaction_periodes.index')->with('success_message', 'Data dengan id' . $id . ' berhasil dihapus');
    }
}
