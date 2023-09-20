<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companyindex(Company $company) {
        $companydata = Company::all();
        $employeedata = Employee::all();
        return view('admin',[
            'company' => $companydata,
            'employees' => $employeedata
        ]);
        // return view('Admin', compact('company'));
    }

    public function store(Company $company, Request $request){


    }
}
