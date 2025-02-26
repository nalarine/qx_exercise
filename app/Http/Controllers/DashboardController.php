<?php


namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::all();

        return view('dashboard', compact('companies', 'employees'));
    }
}
