<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('CRM.company', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        try {
            // check if logo is uploaded
            $file_name = null;
            if($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $file_name = $request->name.'_'.time().'.'.$extension;
                $file->move('uploads/', $file_name);
            }
            // save entry to database
            Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $file_name,
            ]);
            return redirect()->back()->with('success', 'New company created successfully.');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'Error occurred while creating.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        try {
            // check if logo is uploaded
            $file_name = null;
            if($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $file_name = $request->name.'_'.time().'.'.$extension;
                $file->move('uploads/', $file_name);
            }
            // save entry to database
            $company = Company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;
            if($file_name) $company->logo = $file_name;
            $company->update();
            return redirect()->back()->with('success', 'Company updated successfully.');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'Error occurred while updating.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try{
            $company->delete();
            return redirect()->back()->with('success', 'company record deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while delete.');
        }
    }
}
