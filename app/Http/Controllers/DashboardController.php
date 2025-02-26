<?php


namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
    $employees = Employee::paginate(10);

        return view('dashboard', compact('companies', 'employees'));
    }
}
