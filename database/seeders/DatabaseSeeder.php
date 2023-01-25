<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Employee::truncate();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        Company::create([
            'Slug' => 'company-one',
            'Name' => 'Company One',
            'Email' => 'company.one@gmail.com',
            'Website' => 'www.companyOne.co.uk'
        ]);
            
        Company::create([
            'Slug' => 'company-two',
            'Name' => 'Company Two',
            'Email' => 'company.two@gmail.com',
            'Website' => 'www.companyTwo.co.uk'
        ]);
        
        Company::create([
            'Slug' => 'company-three',
            'Name' => 'Company Three',
            'Email' => 'company.three@gmail.com',
            'Website' => 'www.companyThree.co.uk'
        ]);
        
        Employee::create([
            'FirstName' => 'Micheal',
            'LastName' => 'Terrance',
            'Company_id' => '1',
            'Email' => 'micheal.terrance@gmail.com',
            'PhoneNumber' => '07795867463'
        ]);
        
        Employee::create([
            'FirstName' => 'Yuna',
            'LastName' => 'Kuma',
            'Company_id' => '3',
            'Email' => 'Yuna.Kuma@gmail.com',
            'PhoneNumber' => '07685867564'
        ]);
        
        Employee::create([
            'FirstName' => 'Ashley',
            'LastName' => 'Terrance',
            'Company_id' => '2',
            'Email' => 'micheal.terrance@gmail.com',
            'PhoneNumber' => '07495845683'
        ]);
        
        Employee::create([
            'FirstName' => 'Alice',
            'LastName' => 'Kuma',
            'Company_id' => '3',
            'Email' => 'Alice.Kuma@gmail.com',
            'PhoneNumber' => '07456875646'
        ]);
        
        Employee::create([
            'FirstName' => 'Bob',
            'LastName' => 'Dabuilder',
            'Company_id' => '2',
            'Email' => 'bob.dabuilder@gmail.com',
            'PhoneNumber' => '07325845683'
        ]);
    }
}
