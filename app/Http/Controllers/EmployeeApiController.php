<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        return Employee::all();
    }


    public function store(Request $request)
    {

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->logo = $request->logo;
        $employee->website = $request->website;
        $employee->save();
        return $employee;

    }


    public function show(Company $company)
    {
        return $company;
    }


    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->update();
        return $company;
    }


    public function destroy(Company $company)
    {
        $company->delete();
        return "Successful";
    }
}
