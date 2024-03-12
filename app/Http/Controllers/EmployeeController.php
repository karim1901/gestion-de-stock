<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    public function index()
    {
        $admin = Auth::user();
        $emps = Employee::latest()->get();
        return view('employee.index',compact('admin' ,'emps'));
    }


    public function create()
    {
        $admin = Auth::user();
        return view('employee.create',compact('admin'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'userName'=>'required',
            'password'=>'required',
        ]);
        // dd($request->all());


        $admin =Auth::user();

        Employee::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'userName'=>$request->userName,
            'password'=>$request->password,
            'id_admin'=> $admin->id,
        ]);

        return redirect()->route('employee.index');

    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit(Employee $employee)
    {
        $admin = Auth::user();
        return view('employee.edit',compact('admin','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'userName'=>'required',
            'password'=>'required',
        ]);
        // dd($request->all());


        $admin =Auth::user();

        $employee->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'userName'=>$request->userName,
            'password'=>$request->password,
            'id_admin'=> $admin->id,
        ]);

        return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');

    }
}
