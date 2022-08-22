<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use App\Models\UserDetailModel;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use File;


class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_details = UserDetailModel::with('user')->get();

        return view('user_details.index', ['user_details' => $user_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailRequest $request)
    {
        $array = $request->only([
            'name_full', 'ktp', 'ktp_address', 'home_address', 'status_residence', 'profession', 'closest_family_phone', 'closest_family_name', 'closest_family_relation', 'users_id', 'emergency_surename', 'emergency_address', 'image_ktp', 'image_kk',
        ]);
        if ($kkImage = $request->file('image_kk')) {
            $destinationPath = 'temp_kk/';
            $imageKK = date('YmdHis') . "." . $kkImage->getClientOriginalExtension();
            $kkImage->move($destinationPath, $imageKK);
            $array['image_kk'] = "$kkImage";
        }

        if ($ktpImage = $request->file('image_ktp')) {
            $destinationPath = 'temp_ktp/';
            $imageKtp = date('YmdHis') . "." . $ktpImage->getClientOriginalExtension();
            $ktpImage->move($destinationPath, $imageKtp);
            $array['image_ktp'] = "$ktpImage";
        }
        $user_details = UserDetailModel::create($array);
        return redirect()->route('user_details.index')->with('success_message', 'Berhasil menambah User Detail Baru');
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
        $user_details = UserDetailModel::find($id);
        if (!$user_details) return redirect()->route('user_details.index')->with('error_message', 'UserDetail dengan id' . $id . 'tidak ditemukan');
        return view('user_details.edit', [
            'user_details' => $user_details,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailRequest $request, $id)
    {
        $user_details = UserDetailModel::find($id);
        $user_details->name_full = $request->name_full;
        $user_details->ktp = $request->ktp;
        $user_details->ktp_address = $request->ktp_address;
        $user_details->home_address = $request->home_address;
        $user_details->status_residence = $request->status_residence;
        $user_details->profession = $request->profession;
        $user_details->closest_family_phone = $request->closest_family_phone;
        $user_details->closest_family_name = $request->closest_family_name;
        $user_details->closest_family_relation = $request->closest_family_relation;
        $user_details->users_id = $request->users_id;
        $user_details->emergency_surename = $request->emergency_surename;
        $user_details->emergency_address = $request->emergency_address;
        $user_details->image_ktp = $request->image_ktp;
        $user_details->image_kk = $request->image_kk;

        if ($imageKk = $request->file('image_kk')) {
            $destinationPath = 'temp_kk/';
            $kkImage = date('YmdHis') . "." . $imageKk->getClientOriginalExtension();
            $imageKk->move($destinationPath, $kkImage);
            $user_details['image_kk'] = "$kkImage";
        } else {
            unset($user_details['image_kk']);
        }

        if ($imageKtp = $request->file('image_ktp')) {
            $destinationPath = 'temp_ktp/';
            $ktpImage = date('YmdHis') . "." . $imageKtp->getClientOriginalExtension();
            $imageKtp->move($destinationPath, $ktpImage);
            $user_details['image_ktp'] = "$ktpImage";
        } else {
            unset($user_details['image_ktp']);
        }
        $user_details->save();
        return redirect()->route('user_details.index')->with('success_message', 'Berhasil Mengubah User Detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetailRequest $request, $id)
    {
        $user_details = UserDetailModel::find($id);
        if ($id == $request->user()->id) return redirect()->route('user_details.index')->with('error_message', 'Anda tidak dapat menghapus diri sendiri');
        if ($user_details) $user_details->delete();
        return redirect()->route('user_details.index')->with('success_message', 'Berhasil Menghapus User Detail');
    }
}
