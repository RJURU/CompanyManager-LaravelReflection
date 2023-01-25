<?php

use App\Models\Company;
use App\Models\Employee;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompanyEmployeesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Companies
Route::post('/', [CompanyController::class, 'store'] );
Route::get('/', [CompanyController::class, 'index'])->name('home');
Route::get('admin/company/{company}/edit', [CompanyController::class, 'edit']);
Route::patch('admin/company/{company}', [CompanyController::class, 'update']);
Route::delete('admin/company/{company}', [CompanyController::class, 'destroy']);


//Employees
Route::get('companies/{company:Slug}', [CompanyController::class, 'show']);
Route::post('companies/{company:Slug}/employees', [CompanyEmployeesController::class, 'store']);
Route::get('admin/employee/{employee}/edit', [CompanyEmployeesController::class, 'edit']);
Route::patch('admin/employee/{employee}', [CompanyEmployeesController::class, 'update']);
Route::delete('admin/employee/{employee}', [CompanyEmployeesController::class, 'destroy']);



//Login
Route::get('login', [SessionController::class, 'login'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'logout'])->middleware('auth');

