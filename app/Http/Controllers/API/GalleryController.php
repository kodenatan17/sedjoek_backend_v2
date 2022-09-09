<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\GalleryModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $url = $request->input('url');
        $product = $request->input('product');

        if ($id) {
            $gallery = GalleryModel::with(['product'])->find($id);
            if ($gallery) {
                return ResponseFormatter::success($gallery, 'Data Kategori berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Kategori tidak ada', 404);
            }
        }
        $gallery = GalleryModel::query();

        if ($url) {
            $gallery->where('url', 'like', '%' . $url . '%');
        }
        if ($product) {
            $gallery->where('product');
        }
        return ResponseFormatter::success(
            $gallery->paginate($limit),
            'Data Kategori berhasil diambil'
        );
        // $data = GalleryModel::all();
        // return response()->json($data);
    }
}
