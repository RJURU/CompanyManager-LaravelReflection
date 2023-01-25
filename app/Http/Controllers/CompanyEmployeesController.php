<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class CompanyEmployeesController extends Controller
{
    
    public function store(Company $company) {

        $attributes = request()->validate([
            'FirstName' => [ 'required', 'max:255' ],
            'LastName' => [ 'required', 'max:255' ],
            'Email' => [ 'max:255', 'email', 'nullable' ],
            'PhoneNumber' => [ 'max:25', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', 'nullable' ]
        ], [
            'PhoneNumber.regex' => 'Please Enter A Valid Phone Number.'
        ]);

        $attributes['FirstName'] = ucfirst(strtolower($attributes['FirstName']));
        $attributes['LastName'] = ucfirst(strtolower($attributes['LastName']));

        $attributes['Company_id'] = $company->id;

        Employee::create($attributes);

        return back();
    }

    public function edit(Employee $employee) {
        return view('admin.employee.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee) {

        $attributes = request()->validate([
            'FirstName' => [ 'required', 'max:255' ],
            'LastName' => [ 'required', 'max:255' ],
            'Email' => [ 'max:255', 'email', 'nullable' ],
            'PhoneNumber' => [ 'max:25', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', 'nullable' ]
        ], [
            'PhoneNumber.regex' => 'Please Enter A Valid Phone Number.'
        ]);

        $attributes['FirstName'] = ucfirst(strtolower($attributes['FirstName']));
        $attributes['LastName'] = ucfirst(strtolower($attributes['LastName']));

        $employee->update($attributes);

        $slug = $employee->company->Slug;
        
        $link = "/companies/".$slug;

        return redirect($link);
    }

    
    public function destroy(Employee $employee) {
        $employee->delete();

        return back();
    }
}
