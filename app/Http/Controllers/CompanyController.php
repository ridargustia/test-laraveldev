<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Storage;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);
        return view('company/index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'file|image|required|mimes:png|max:2000|dimensions:min_width=100,min_height=100',
            'website' => 'required|string',
        ]);

        $file = $request->file('logo');   
        //mengambil nama file
        $file_name = time()."_".$request->name.".".$file->getClientOriginalExtension();
        $path = $file->storeAs('company', $file_name);
        

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $file_name,
            'website' => $request->website,
        ]);     
        return redirect('/companies')->with('status', 'Company added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company/detail', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company/form_edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'file|image|mimes:png|max:2000|dimensions:min_width=100,min_height=100',
            'website' => 'required|string',
        ]);
        
        

        if($request->file('logo'))
        {
            if($company->logo)
            {
                Storage::delete('company/'.$company->logo);
            }

            $file = $request->file('logo');   
            //mengambil nama file
            $file_name = time()."_".$request->name.".".$file->getClientOriginalExtension();
            $path = $file->storeAs('company', $file_name);

            Company::where('id', $company->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $file_name,
                'website' => $request->website,
            ]);
        }else{
            Company::where('id', $company->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $company->logo,
                'website' => $request->website,
            ]);
        }
        return redirect('/companies')->with('status', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return redirect('/companies')->with('status', 'Company has been deleted successfully.');
    }
}
