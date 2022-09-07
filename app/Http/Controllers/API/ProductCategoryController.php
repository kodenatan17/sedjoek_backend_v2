<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductCategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $show_category = $request->input('show_category');

        if ($id) {
            $category = CategoryModel::with(['products'])->find($id);
            if ($category) {
                return ResponseFormatter::success($category, 'Data Kategori berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Kategori tidak ada', 404);
            }
        }
        $category = CategoryModel::query();

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }
        if ($show_category) {
            $category->with('products');
        }
        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data Kategori berhasil diambil'
        );
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $newComment = new CategoryModel([
            'name' => $request->get('name'),
        ]);

        $newComment->save();

        return response()->json($newComment);
    }

    public function update(Request $request, $id)
    {
        $data = CategoryModel::findOrFail($id);

        $request->validate([
            'name' => 'required',
        ]);

        $data->name = $request->get('name');

        $data->save();

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = CategoryModel::findOrFail($id);
        $data->delete();

        return response()->json($data::all());
    }
}
