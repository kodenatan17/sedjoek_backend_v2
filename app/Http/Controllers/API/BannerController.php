<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $urlImage = $request->input('urlImage');
        $limit = $request->input('limit');
        $show_banner = $request->input('show_banner');

        if ($id) {
            $banner = BannerModel::all()->find($id);
            if ($banner) {
                return ResponseFormatter::success($banner, 'Data Banner berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Banner tidak ada', 404);
            }
        }
        $banner = BannerModel::query();

        if ($urlImage) {
            $banner->where('urlImage', 'like', '%' . $urlImage . '%');
        }
        if ($show_banner){
            $banner->all();
        }
        return ResponseFormatter::success(
            $banner->paginate($limit),
            'Data Banner berhasil diambil',
        );
    }
}
