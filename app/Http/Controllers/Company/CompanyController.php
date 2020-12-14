<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompany;
use App\Http\Requests\Company\UpdateCompany;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::with('employees')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(StoreCompany $request)
    {
        $company = new Company($request->all());
        $company->save();
        $company->addMedia($request['logo'])->toMediaCollection('logo');
        return redirect()->back()->with('success', 'Company Has Been Saved Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Company $company)
    {
        $employees = $company->employees()->paginate(10);
        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View|Response
     */
    public function edit(Company $company)
    {
        $logo = $company->getMedia('logo');
        return view('companies.edit', compact('company', 'logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        if ($request['logo']) {
            $company->clearMediaCollection('logo');
            $company->addMedia($request['logo'])->toMediaCollection('logo');
        }
        $company->update([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);
        return redirect()->back()->with('success', 'Company Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Company $company)
    {
        $company->clearMediaCollection('logo');
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success', 'Company Has Been Deleted Successfully');
    }
}
