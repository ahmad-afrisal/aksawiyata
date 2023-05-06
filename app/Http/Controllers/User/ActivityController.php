<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Activity\StoreLogbookRequest;
use App\Http\Requests\User\Activity\StoreReportRequest;
use App\Http\Requests\User\Review\StoreReviewRequest;
use App\Models\Checkout;
use App\Models\Job;
use App\Models\Logbook;
use App\Models\Report;
use App\Models\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::with('Job')->where('user_id', Auth::id())
        ->where('status', '=', 'selesai')->orWhere('status', '=', 'sedang berjalan')
        ->take(1)->get(); 
        // return $checkouts;

        if($checkouts->isEmpty() > 0) {
            
            return view('user.dashboard.activity', [
                'checkouts' => $checkouts
            ]);
        }
        else {
            
            $item = Report::where('user_id', Auth::id())->first();

            return view('user.dashboard.activity', [
                'item' => $item,
                'report' => str_replace('public/assets/report/', '', $item->report),
                'checkouts' => $checkouts
    
            ]);
        }

        
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function review(StoreReviewRequest $request, String $id)
    {
        // mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['job_id'] = $id;

        
        // create checkout
        $userReview = UserReview::create($data);
        
        $request->session()->flash('success', "Ulasan Berhasil ditambahkan");
        return redirect(route('user.activity.index'));
    }

    public function report(StoreReportRequest $request)
    {
        $item = Report::where('user_id', Auth::user()->id)->first();
        if($item) {
            Storage::delete($item->report);
            $item->delete();
        }
        

        $data = $request->all();    
        
        $data['user_id'] = Auth::user()->id;
        $data['report'] = $request->file('report')->storeAs('public/assets/report', 'laporan-'.str_replace(" ","-",Auth::user()->name).'-'.Auth::user()->nim.'-'.Str::random(15).'.pdf',);
        $data['status'] = "Sedang Diperiksa";

        Report::create($data);


        return redirect()->route('user.activity.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function logbook(StoreLogbookRequest $request)
    {
        $dateCheck = Carbon::now()->format('Y-m-d');
        $isFilled = Logbook::whereUserId(Auth::id())->where('date',$dateCheck)->exists();

        // return $isFilled;
        if ($isFilled)   {
            return redirect()->back()->with('error', 'Form sudah diisi sebelumnya');
        } else {           
    
            $data = $request->all();    
            $formatPhoto = $request->file('photo')->getClientOriginalExtension();
            $tanggal = Carbon::now()->format('d-m-Y');
            $data['date'] = $dateCheck; 
            $data['user_id'] = Auth::user()->id;
            $data['photo'] = $request->file('photo')->storeAs('public/assets/documentation', 'documentation-'.str_replace(" ","-",Auth::user()->name).'-'.$tanggal.'-'.Str::random(15).'.'.$formatPhoto);
    
            Logbook::create($data);
    
    
            return redirect()->route('user.activity.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
        }

    }

    public function history()
    {
        $logbooks = Logbook::where('user_id', Auth::id())->get();
        return view('user.dashboard.history', [
            'logbooks' => $logbooks,
        ]);
    }

}
