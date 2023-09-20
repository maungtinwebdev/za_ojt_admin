<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{

    public function index()
    {
        return Company::all();
    }


    public function store(Request $request)
    {

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->save();
        return $company;

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
