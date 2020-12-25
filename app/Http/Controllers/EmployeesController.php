<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all compaines
        $compaines = Company::all();
        $employees = Employees::all();
        return view('CRM.employees', compact('compaines', $compaines, 'employees', $employees));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Employees::create($this->validateRequest($request));
            return redirect()->back()->with('success', 'New employee created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while creating');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employees $employee)
    {
        try{
            $employee->update($this->validateRequest($request));
            return redirect()->back()->with('success', 'Employee updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while updating employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        try{
            $employee->delete();
            return redirect()->back()->with('success', 'Employee deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while deleting the employee.');
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validateRequest(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required'
        ]);
        return $data;
    }
}
