<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

//@todo: refractor the upload component
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCompanyRequest $request)
    {
        $validated = $request->validated();
        // Handle file Upload
        $path = null;
        if($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = 'logos/'.md5(now()).'.'.$extension;
            Storage::disk('public')->put($path, $request->file('logo')->get());
        }

        $company = new Company();
        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->logo = $path;
        $company->website = $validated['website'];
        $company->save();


        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        // Handle file Upload
        $path = null;
        if($request->hasFile('logo')) {
            Storage::disk('public')->delete($company->logo);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $path = 'logos/'.md5(now()).'.'.$extension;
            Storage::disk('public')->put($path, $request->file('logo')->get());
            $company->logo = $path;
        }

        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->website = $validated['website'];

        $company->save();


        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
