<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SurveyModel;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $transaction_stock_id = $request->input('transaction_stock_id');
        $user_id = $request->input('user_id');
        $address = $request->input('address');
        $status = $request->input('status');

        $user = $request->input('user');
        $transactionStock = $request->input('transactionStock');

        if ($id) {
            $survey = SurveyModel::with('user', 'transactionStock')->find($id);
            if ($survey) {
                return ResponseFormatter::success($survey, 'Data Kategori berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Kategori tidak ada', 404);
            }
        }
        $survey = SurveyModel::query();
            if ($transaction_stock_id) {
                $survey->where('transaction_stock_id', 'like', '%' . $transaction_stock_id . '%');
            }
            if ($user_id) {
                $survey->where('user_id', 'like', '%' . $user_id . '%');
            }
            if ($address) {
                $survey->where('addrees', 'like', '%' . $address . '%');
            }
            if ($status) {
                $survey->where('status', 'like', '%' . $status . '%');
            }
            if ($user) {
                $survey->where('user', $user);
            }
            if ($transactionStock) {
                $survey->where('transactionStock', $transactionStock);
            }
        return ResponseFormatter::success(
            $survey->paginate($limit),
            'Data Kategori berhasil diambil'
        );
        $data = SurveyModel::all();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = SurveyModel::findOrFail($id);

        $request->validate([
            'transaction_stock_id' => 'required',
            'user_id' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $data->transaction_stock_id = $request->get('transaction_stock_id');
        $data->user_id = $request->get('user_id');
        $data->address = $request->get('address');
        $data->status = $request->get('status');

        $data->save();

        return response()->json($data);
    }

}
