<?php

namespace App\Http\Controllers;
 
use App\Http\Requests\InstallitationControlRequest;
use App\Models\InstallitationControlModel;
use App\Models\User;
use Illuminate\Http\Request;


class InstallitationControlController extends Controller
{
    public function index()
    {
        $installitation = InstallitationControlModel::with('user')->get();
        // dd($installitation);
        return view('installitation.index', compact('installitation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('installitation.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstallitationControlRequest $request)
    {
        $array = $request->all();
        $installitation = InstallitationControlModel::create($array);
        return redirect()->route('installitation.index')->with('success_message', 'Berhasil Menambahkan Transaksi Baru');
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
        $installitation = InstallitationControlModel::find($id);
        if (!$installitation) return redirect()->route('installitation.index')->with('error_message', 'Transaksi dengan id' . $id . 'tidak ditemukan');
        return view('installitation.edit', compact('users', 'installitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstallitationControlRequest $request, $id)
    {
        $installitation = InstallitationControlModel::find($id);
        // $installitation->name = $request->name;
        $installitation->users_id = $request->users_id;
        $installitation->address = $request->address;
        // $installitation->payment = $request->payment;
        $installitation->total_price = $request->total_price;
        $installitation->shipping_price = $request->shipping_price;
        $installitation->status = $request->status;
        // dd($installitation);
        $installitation->save();
        return redirect()->route('installitations.index')->with('success_message', 'Berhasil mengubah Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $installitation = InstallitationControlModel::find($id);
        if ($installitation) $installitation->delete();
        return redirect()->route('installitations.index')->with('success_message', 'Berhasil menghapus Transaksi');
    }

}


