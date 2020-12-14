<?php

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

Route::group(['prefix'=>'admin', 'middleware'=> 'auth'],function(){
//    Route::resource('companies',\App\Http\Controllers\Company\CompanyController::class);
    Route::get('companies', [\App\Http\Controllers\Company\CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [\App\Http\Controllers\Company\CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies/store', [\App\Http\Controllers\Company\CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{company}-{slug}', [\App\Http\Controllers\Company\CompanyController::class, 'show'])->name('companies.show');
    Route::get('companies/{company}', [\App\Http\Controllers\Company\CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('companies/{company}/update', [\App\Http\Controllers\Company\CompanyController::class, 'update'])->name('companies.update');
    Route::delete('companies/{company}', [\App\Http\Controllers\Company\CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('employees', [\App\Http\Controllers\Employee\EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [\App\Http\Controllers\Employee\EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees/store', [\App\Http\Controllers\Employee\EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{employee}-{slug}', [\App\Http\Controllers\Employee\EmployeeController::class, 'show'])->name('employees.show');
    Route::get('employees/{employee}', [\App\Http\Controllers\Employee\EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('employees/{employee}/update', [\App\Http\Controllers\Employee\EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{employee}', [\App\Http\Controllers\Employee\EmployeeController::class, 'destroy'])->name('employees.destroy');

});


