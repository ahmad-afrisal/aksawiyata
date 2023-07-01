<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyRequest;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\CompanyGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $companiesCount = Company::count();
        return view('admin.company.index', [
            'companies' => $companies,
            'companiesCount' => $companiesCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lectures = User::where('roles',2)->get();
        $mentors = User::where('roles',3)->get();

        return view('admin.company.create',[
            'lectures' => $lectures,
            'mentors' => $mentors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();       

        $data['slug'] = Str::slug($request->name);
        $data['logo'] = $request->file('logo')->store('assets/logo','public');
        $company = Company::create($data);

        $files = $request->file('photo');
        foreach ($files as $file) {
            $gallery = [
                'photos' => $file->store('assets/company','public'),
                'companies_id' => $company->id,
            ];
            CompanyGallery::create($gallery);
        }

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company =  Company::with(['CompanyGallery'])->findOrFail($id);

        return view('admin.company.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::with(['CompanyGallery','Adviser','Examiner','Mentor'])->findOrFail($id);
        $lectures = User::where('roles',2)->get();
        $mentors = User::where('roles',3)->get();


        return view('admin.company.edit', [
            'company' => $company,
            'lectures' => $lectures,
            'mentors' => $mentors,
        ]);
        
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photo')->store('assets/company','public');

        CompanyGallery::create($data);

        return redirect()->route('admin.company.edit', $request->companies_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = CompanyGallery::findOrFail($id);

        Storage::delete('public/'.$item->photos);

        $item->delete();

        return redirect()->route('admin.company.edit', $item->companies_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $data = $request->all();

        $item = Company::findOrFail($id);


        if($request->hasFile('logo')) {
            $data['slug'] = Str::slug($request->name);
            $data['logo'] = $request->file('logo')->store('assets/logo','public');
            
            Storage::delete('public/'.$item->logo);
    
            $item->update($data);

        } else {
            $item->update([
                'name'     => $request->name,
                'slug'     => Str::slug($request->name),
                'mentor_id'     => $request->mentor_id,
                'adviser_id'     => $request->adviser_id,
                'examiner_id'     => $request->examiner_id,
                'about'     => $request->about,
                'ceo'     => $request->ceo,
                'number_of_employees'     => $request->number_of_employees,
                'webiste_link'     => $request->webiste_link,
                'street'     => $request->street,
                'postal_code'     => $request->postal_code,
                'district'     => $request->district,
                'regency'     => $request->regency,
                'province'     => $request->province,
            ]);
        }

        return redirect()->route('admin.company.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
