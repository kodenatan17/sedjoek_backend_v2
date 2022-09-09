<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /** @var  CouponRepository */
    private $couponRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();

        return view('employees.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('employees.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->only([
            'nik' => 'required|unique',
            'name' => 'required',
            'jobs' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'join_date' => 'required'
        ]);
        $employee = Employee::create($array);
        return redirect()->route('employees.index')->with('success_message', 'Berhasil Menambahkan Article Baru');
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
        $employee = Employee::find($id);
        if (!$employee) return redirect()->route('employees.index')->with('error_message', 'Article dengan id' . $id . 'tidak ditemukan');
        return view('employees.edit', compact('employee'));
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
        $employee = Employee::find($id);
        $employee->nik = $request->nik;
        $employee->name = $request->name;
        $employee->jobs = $request->jobs;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->join_date = $request->join_date;
        $employee->save();
        return redirect()->route('employees.index')->with('success_message', 'Berhasil mengubah artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if ($employee) $employee->delete();
        return redirect()->route('employees.index')->with('success_message', 'Berhasil menghapus artikel');
    }
}
