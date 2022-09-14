<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\SurveyModel;
use App\Models\Technician;
use App\Models\TransactionStock;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $survey = SurveyModel::with('user', 'transaction_stocks', 'technicians')->get();
        // dd($survey);
        return view('list_survey.index', compact('survey'));
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
    public function store(Request $request)
    {
        $array = $request->all();
        $survey = SurveyModel::create($array);
        return redirect()->route('list_survey.index')->with('success_message', 'Berhasil Menambahkan List Survey Baru');
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
        $survey = SurveyModel::find($id);
        $users = User::all();
        $transaction_stocks = TransactionStock::all();
        $technician_users = Technician::all();

        if (!$survey) return redirect()->route('list_survey.index')->with('error_message', 'List survey dengan id' . $id . 'tidak ditemukan');
        return view('list_survey.edit', compact('users','transaction_stocks', 'survey', 'technician_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = SurveyModel::find($id);
        $survey->users_id = $request->users_id;
        $survey->transaction_stock_id; // nama produk
        $survey->transaction_stock_id; // nama survey
        $survey->address = $request->address;
        $survey->status = $request->status;

        $survey->save();
        return redirect()->route('list_survey.index')->with('success_message', 'Berhasil Memperbarui List Survey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = SurveyModel::find($id);
        if ($survey) $survey->delete();
        return redirect()->route('list_survey.index')->with('success_message', 'Berhasil Menghapus Survey');
    }

}
