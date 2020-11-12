<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('employee/index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee/form_create', compact('companies'));
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
            'name' => 'required|string',
            'id_company' => 'required',
            'email' => 'required|email',
        ]);

        Employee::create([
            'name' => $request->name,
            'id_company' => $request->id_company,
            'email' => $request->email,
        ]);     
        return redirect('/employees')->with('status', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $result = DB::select('SELECT employees.id AS id, employees.name AS name_employee, companies.name AS name_company, employees.email AS email FROM employees INNER JOIN companies ON employees.id_company = companies.id AND employees.id = '.$employee->id);
        // dd($result);
        return view('employee/detail', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee/form_edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string',
            'id_company' => 'required',
            'email' => 'required|email',
        ]);

        Employee::where('id', $employee->id)
            ->update([
                'name' => $request->name,
                'id_company' => $request->id_company,
                'email' => $request->email,
            ]);    
        return redirect('/employees')->with('status', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect('/employees')->with('status', 'Company has been deleted successfully.');
    }
}
