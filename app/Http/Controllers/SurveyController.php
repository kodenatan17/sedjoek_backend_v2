<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\SurveyModel;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $survey = SurveyModel::all();
        // dd($installitation);
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
        $users = User::all();
        $transaction_stock_id = Stock::all();
        $survey = SurveyModel::find($id);

        if (!$survey) return redirect()->route('list_survey.index')->with('error_message', 'List survey dengan id' . $id . 'tidak ditemukan');
        return view('list_survey.edit', compact('users','transaction_stock_id', 'survey'));
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
