<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index () 
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create () 
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function show (string $id)
    {
        $show_employee = Employee::findOrFail($id);

        return response()->json($show_employee);
    }

    public function store (CreateEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        return response()->json(['message' => 'Employee created successfully', 'data' => $employee]);
    }

    public function update (UpdateEmployeeRequest $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());

        return response()->json(['message' => 'Employee updated successfully', 'data' => $employee]);
    }

    public function destroy (string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
