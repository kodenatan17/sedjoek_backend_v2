<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $user = Employee::all();
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
        // dd($request);
        $this->validate($request, [
            'nik' => 'required|unique',
            'name' => 'required',
            'jobs' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'join_date' => 'required'
        ]);

        Employee::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'jobs' => $request->jobs,
            'phone' => $request->phone,
            'address' => $request->address,
            'join_date' => $request->join_date
        ]);
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

    public function reportForm()
    {
        return view('employees.report');
    }

    // public function reportForm($startDate, $endDate)
    // {
    //     dd(["Tanggal Awal : ".$startDate, "Tanggal Akhir : ".$endDate]);
    //     $employee = Employee::whereBetween('created_at', [$startDate, $endDate])->get();
    //     return view('employees.report-form', compact('employee'));
    // }
    public function report(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $employees = Employee::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $employees = Employee::latest()->get();
                }
            } else {
                $employees = Employee::latest()->get();
            }

            return response()->json([
                'employees' => $employees
            ]);
        } else {
            abort(403);
        }
    }

}
