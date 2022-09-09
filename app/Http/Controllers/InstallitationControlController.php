<?php

namespace App\Http\Controllers;
 
use App\Http\Requests\InstallitationControlRequest;
use App\Models\InstallitationControlModel;
use App\Models\Stock;
use App\Models\User;
use App\Models\TransactionStock;
use Illuminate\Http\Request;


class InstallitationControlController extends Controller
{
    public function index()
    {
        $installitation = InstallitationControlModel::with('user', 'stocks', 'transactionStock')->get();
        // dd($installitation);
        return view('installitation_control.index', compact('installitation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if($request->file('photo_location')){
            $array['photo_location'] = $request->file('photo_location')->store('location-images');
        }
        if($request->file('photo_point_installation')){
            $array['photo_point_installation'] = $request->file('photo_point_installation')->store('installitation-images');
        }
        if($request->file('photo_unit')){
            $array['photo_unit'] = $request->file('photo_unit')->store('unit-images');
        }
        if($request->file('photo_indoor_installation')){
            $array['photo_indoor_installation'] = $request->file('photo_indoor_installation')->store('indoor-images');
        }
        if($request->file('photo_outdoor_installation')){
            $array['photo_outdoor_installation'] = $request->file('photo_outdoor_installation')->store('outdoor-images');
        }
        if($request->file('photo_ac_on')){
            $array['photo_point_installation'] = $request->file('photo_point_installation')->store('installitation-images');
        }
        if($request->file('photo_pipe_used')){
            $array['photo_point_installation'] = $request->file('photo_point_installation')->store('installitation-images');
        }

        $installitation = InstallitationControlModel::create($array);
        return redirect()->route('installitation_control.index')->with('success_message', 'Berhasil Menambahkan Pemasangan Unit Baru');
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
        $transaction_stock_id = Stock::all();
        $installitation = InstallitationControlModel::find($id);

        if (!$installitation) return redirect()->route('installitation_control.index')->with('error_message', 'Pemasangan dengan id' . $id . 'tidak ditemukan');
        return view('installitation_control.edit', compact('users', 'installitation', 'transaction_stock_id'));
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
        $installitation->transaction_stock_id = $request->transaction_stock_id;
        $installitation->address = $request->address;
        // $installitation->payment = $request->payment;
        $installitation->total_price = $request->total_price;
        $installitation->shipping_price = $request->shipping_price;
        $installitation->status = $request->status;
        $installitation->description_survey = $request->description_survey;
        $installitation->description_install = $request->description_install;
        $installitation->description_finish = $request->description_finish;

        $installitation->photo_location = $request->photo_location;
        if($request->file('photo_location')){
            $installitation['photo_location'] = $request->file('photo_location')->store('location-images');
        }
        $installitation->photo_point_installation = $request->photo_point_installation;
        if($request->file('photo_point_installation')){
            $installitation['photo_point_installation'] = $request->file('photo_point_installation')->store('installation-images');
        }
        $installitation->photo_unit = $request->photo_unit;
        if($request->file('photo_unit')){
            $installitation['photo_unit'] = $request->file('photo_unit')->store('unit-images');
        }
        $installitation->photo_indoor_installation = $request->photo_indoor_installation;
        if($request->file('photo_indoor_installation')){
            $installitation['photo_indoor_installation'] = $request->file('photo_indoor_installation')->store('indoor-images');
        }
        $installitation->photo_outdoor_installation = $request->photo_outdoor_installation;
        if($request->file('photo_outdoor_installation')){
            $installitation['photo_outdoor_installation'] = $request->file('photo_outdoor_installation')->store('outdoor-images');
        }
        $installitation->photo_ac_on = $request->photo_ac_on;
        if($request->file('photo_ac_on')){
            $installitation['photo_ac_on'] = $request->file('photo_ac_on')->store('ac_on-images');
        }
        $installitation->photo_pipe_used = $request->photo_pipe_used;
        if($request->file('photo_pipe_used')){
            $installitation['photo_pipe_used'] = $request->file('photo_pipe_used')->store('pipe_used-images');
        }

        $installitation->save();
        return redirect()->route('installitation_control.index')->with('success_message', 'Berhasil Memperbarui Pemasangan');
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
        return redirect()->route('installitation_control.index')->with('success_message', 'Berhasil Menghapus Pemasangan');
    }

}


