<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\UserDetailModel;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name_full = $request->input('name_full');
        $ktp = $request->input('ktp');
        $ktp_address = $request->input('ktp_address');
        $status_residence = $request->input('status_residence');
        $profession = $request->input('profession');
        $closest_family_phone = $request->input('closest_family_phone');
        $closest_family_name = $request->input('closest_family_name');
        $closest_family_relation = $request->input('closest_family_relation');
        $users_id = $request->input('users_id');
        $emergency_surename = $request->input('emergency_surename');
        $emergency_address = $request->input('emergency_address');
        $show_user_details = $request->input('show_user_details');

        if ($id) {
            $user_detail = UserDetailModel::with(['user'])->find($id);
            if ($user_detail) {
                return ResponseFormatter::success($user_detail, 'Data User Detail berhasil dikirim');
            } else {
                return ResponseFormatter::error(null, 'Data User Detail tidak ada', 404);
            }
        }
        $user_detail = UserDetailModel::query();

        if ($name_full) {
            $user_detail->where('name_full', 'like', '%' . $name_full . '%');
        }
        if ($ktp) {
            $user_detail->where('ktp', 'like', '%' . $ktp . '%');
        }
        if ($ktp_address) {
            $user_detail->where('ktp_address', 'like', '%' . $ktp_address . '%');
        }
        if ($status_residence) {
            $user_detail->where('status_residence', 'like', '%' . $status_residence . '%');
        }
        if ($profession) {
            $user_detail->where('profession', 'like', '%' . $profession . '%');
        }
        if ($closest_family_name) {
            $user_detail->where('closest_family_name', 'like', '%' . $closest_family_name . '%');
        }
        if ($closest_family_phone) {
            $user_detail->where('closest_family_phone', 'like', '%' . $closest_family_phone . '%');
        }
        if ($closest_family_relation) {
            $user_detail->where('closest_family_relation', 'like', '%' . $closest_family_relation . '%');
        }
        if ($users_id) {
            $user_detail->where('users_id', 'like', '%' . $users_id . '%');
        }
        if ($emergency_surename) {
            $user_detail->where('emergency_surename', 'like', '%' . $emergency_surename . '%');
        }
        if ($emergency_address) {
            $user_detail->where('emergency_address', 'like', '%' . $emergency_address . '%');
        }
        if($show_user_details){
            $user_detail->with('user');
        }
        return ResponseFormatter::success(
            $user_detail->paginate($limit),
            'Data User Detail berhasil dikirim',
        );
    }
}
