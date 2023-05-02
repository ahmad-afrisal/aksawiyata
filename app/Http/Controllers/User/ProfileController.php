<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('user.dashboard.profile', [
            'transkip' => str_replace('public/assets/transkip/', '', Auth::user()->transkip),
            'cv' => str_replace('public/assets/cv/', '', Auth::user()->cv),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, string $id)
    {
        $data = $request->all();
        // return $request->all();
        
        $item =  User::findOrFail(Auth::user()->id);

        if ($request->hasFile('transkip') and $request->hasFile('cv')) {
            $data['transkip'] = $request->file('transkip')->storeAs('public/assets/transkip', 'transkip-'.str_replace(" ","-",Auth::user()->name).'-'.Auth::user()->nim.'-'.Str::random(15).'.pdf',);
            $data['cv'] = $request->file('cv')->storeAs('public/assets/cv', 'cv-'.str_replace(" ","-",Auth::user()->name).'-'.Auth::user()->nim.'-'.Str::random(15).'.pdf');
            
            Storage::delete($item->transkip);
            Storage::delete($item->cv);


            $item->update($data);
        } elseif($request->hasFile('transkip')) {
            $data['transkip'] = $request->file('transkip')->store('assets/transkip','public');
            
            Storage::delete('public/'.$item->transkip);
    
            $item->update($data);
        } elseif($request->hasFile('cv')) {
            
            $data['cv'] = $request->file('cv')->store('assets/cv','public');
            
            Storage::delete('public/'.$item->cv);
    
            $item->update($data);
        } else {
            $item->update([
                'name'     => $request->name,
                'nim'     => $request->nim,
                'concentration'     => $request->concentration,
                'about'     => $request->about,
                'phone_number'     => $request->phone_number,
                'instagram_profile'     => $request->instagram_profile,
                'github_profile'     => $request->github_profile,
                'linkedin_profile'     => $request->linkedin_profile,
            ]);

        }
    
        return redirect()->route('user.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
