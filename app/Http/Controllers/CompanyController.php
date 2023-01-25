<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class CompanyController extends Controller
{
    public function index(){
        return view('companies', [
            'companies' => Company::filter(request(['search']))->paginate(10),
            'employees' => Employee::all()
        ]);
    }
    

    public function show(Company $company) {
        return view('company', [
            'company' => $company
        ]);
    }

    public function store() {

        $attributes = request()->validate([
            'Logo' => [ 'image', 'nullable', 'dimensions:min_width=100,min_height=100' ],
            'Name' => [ 'required' , 'max:255', ValidationRule::unique('companies', 'Name') ],
            'Email' => [ 'max:255', 'email', 'nullable' ],
            'Website' => [ 'max:255', 'nullable' ]
        ], [
            'Logo.dimensions' => "Logo needs to be at least 100x100px."
        ]);


        $attributes['Slug'] = strtolower(str_replace(' ', '-', $attributes['Name']));
        $attributes['Logo'] = request()->file('Logo')->store('Logos');

        Company::create($attributes);

        return redirect('/');
    }

    public function edit(Company $company) {
        return view('admin.company.edit', ['company' => $company]);
    }

    public function update(Company $company) {

        $attributes = request()->validate([
            'Logo' => [ 'image', 'nullable', 'dimensions:min_width=100,min_height=100' ],
            'Name' => [ 'required' , 'max:255', ValidationRule::unique('companies', 'Name')->ignore($company->id) ],
            'Email' => [ 'max:255', 'email', 'nullable' ],
            'Website' => [ 'max:255', 'nullable' ]
        ], [
            'Logo.dimensions' => "Logo needs to be at least 100x100px."
        ]);

        $attributes['Slug'] = strtolower(str_replace(' ', '-', $attributes['Name']));
        if(isset($attributes['Logo'])) {
            $attributes['Logo'] = request()->file('Logo')->store('Logos');
        }

        $company->update($attributes);

        return redirect("/");

    }

    public function destroy(Company $company) {
        $company->delete();
        
        return back();
    }
}
