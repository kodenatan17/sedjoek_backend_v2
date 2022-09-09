<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $employee = Employee::all();
        return view('users.index', compact('users', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('users.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        $array = $request->only([
            'name', 'email', 'password'
        ]);
        $array['password'] = bcrypt($array['password']);
        $user = User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
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
        $user = User::find($id);
        $employee = Employee::all();
        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id' . $id . ' tidak ditemukan');
        return view('users.edit', compact('user', 'employee'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|confirmed'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
