<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Activity\StoreLogbookRequest;
use App\Http\Requests\User\Activity\StoreReportRequest;
use App\Http\Requests\User\Review\StoreReviewRequest;
use App\Models\Checkout;
use App\Models\Consultation;
use App\Models\Job;
use App\Models\Logbook;
use App\Models\Report;
use App\Models\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkout = Checkout::with('Job')->where('user_id', Auth::id())
        ->where('status', '=', 'selesai')->orWhere('status', '=', 'sedang berjalan')
        ->take(1)->first(); 
        // return $checkout;

        if($checkout == null) {
            
            // return $checkout;
            return view('user.dashboard.activity', [
                'checkout' => $checkout
            ]);
        } else {
            
            $item = Report::where('user_id', Auth::id())->first();
            // $item = Report::all();

            // return $item;

            return view('user.dashboard.activity', [
                'item' => $item,
                'report' => $item->report,
                'checkout' => $checkout
    
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
        DB::beginTransaction();

        try {
            $item = Report::where('user_id', Auth::user()->id)->first();

            $matchingData = [
                'user_id' => Auth::user()->id,
            ];
            

            $data = $request->all();    
            
            $data['user_id'] = Auth::user()->id;
            $data['job_id'] = $item->job_id;
            $data['report'] = $request->report;
            $data['status'] = "Sedang Diperiksa";

            // Report::create($data);
            Report::updateOrCreate($matchingData, $data);

            DB::commit();
            
            return redirect()->route('user.activity.index')->with(['success' => 'Laporan berhasil Ditambahkan!']);


        } catch(\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('warning','Something Went Wrong!');
        }


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
            // $formatPhoto = $request->file('photo')->getClientOriginalExtension();
            $tanggal = Carbon::now()->format('d-m-Y');
            $data['date'] = $dateCheck; 
            $data['user_id'] = Auth::user()->id;
            // $data['photo'] = $request->file('photo')->storeAs('public/assets/documentation', 'documentation-'.str_replace(" ","-",Auth::user()->name).'-'.$tanggal.'-'.Str::random(15).'.'.$formatPhoto);
            $data['photo'] = '-';
    
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

    public function consultation(Request $request, String $id)
    {
        // return $id;
        $this->validate($request, [
            'date' => ['required'],
            'topic' => ['required'],
            'detail' => ['required'],
        ]);

       $user = Consultation::create([
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'job_id' => $id,
            'topic' => $request->topic,
            'detail' => $request->detail,
            'is_accepted' => 3,
        ]);

        return redirect()->route('user.activity.consultation-history')->with('success', 'Data bimbingan baru berhasil ditambakan');

    }

    public function historyConsultation()
    {
        $consultations = Consultation::where('user_id', Auth::id())->get();
        return view('user.dashboard.consultation', [
            'consultations' => $consultations,
        ]);
    }


}
