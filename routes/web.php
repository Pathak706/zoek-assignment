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

Route::get('/', function () {
    return redirect('company');
});

Auth::routes(
    [
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]
);
Route::group(['middleware' => ['auth']], function () {
    Route::resource('company', 'CompanyController');
    Route::resource('employees', 'EmployeesController');
});

#TASK-2
Route::get('fizz-buzz', function() {
   return view('fizz-buzz');
});
#TASK-3
Route::get('validate-triangle', function() {
   return view('validate_triangle');
});
