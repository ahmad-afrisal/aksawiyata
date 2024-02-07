<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use iio\libmergepdf\Merger;

class ReportController extends Controller
{
    public function examine()
    {
        $data = Checkout::select('checkouts.*')
                ->join('jobs', 'checkouts.job_id', '=', 'jobs.id')
                ->where(function ($query) {
                    $query->where('checkouts.status', 'sedang berjalan')
                        ->orWhere('checkouts.status', 'selesai');
                })
                ->orderBy('jobs.company_id')
                ->get();

        return view('admin.report.examine.index', [
            'students' => $data,
        ]);
    }

    public function examineSk(Request $request)
    {

        $no_surat = strtoupper($request->no_surat);

        $m = new Merger();

        $pdf = PDF::loadView('admin.report.examine.sk', ['no_surat' => $no_surat])
            ->setPaper('legal', 'potrait')
            ->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);

        $m->addRaw($pdf->output());

        $data = Checkout::select('checkouts.*')
            ->join('jobs', 'checkouts.job_id', '=', 'jobs.id')
            ->where(function ($query) {
                $query->where('checkouts.status', 'sedang berjalan')
                    ->orWhere('checkouts.status', 'selesai');
            })
            ->orderBy('jobs.company_id')
            ->get();


        $pdf2 = PDF::loadView('admin.report.examine.lampiran', ['data' => $data, 'no_surat' => $no_surat])
        ->setPaper('a4', 'landscape')
        ->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);

        $nama_file = 'Laporan_Data_Dosen_Penguji.pdf';
        $m->addRaw($pdf2->output());
        return response($m->merge())
                ->withHeaders([
                    'Content-Type' => 'application/pdf',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$nama_file,
                ]);
    }


    public function adviser()
    {
        $data = Checkout::select('checkouts.*')
                ->join('jobs', 'checkouts.job_id', '=', 'jobs.id')
                ->where(function ($query) {
                    $query->where('checkouts.status', 'sedang berjalan')
                        ->orWhere('checkouts.status', 'selesai');
                })
                ->orderBy('jobs.company_id')
                ->get();

        return view('admin.report.adviser.index', [
            'students' => $data,
        ]);
    }


    public function adviserSk(Request $request)
    {

        $no_surat = strtoupper($request->no_surat);

        $m = new Merger();

        $pdf = PDF::loadView('admin.report.adviser.sk', ['no_surat' => $no_surat])
            ->setPaper('legal', 'potrait')
            ->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);

        $m->addRaw($pdf->output());

        $data = Checkout::select('checkouts.*')
            ->join('jobs', 'checkouts.job_id', '=', 'jobs.id')
            ->where(function ($query) {
                $query->where('checkouts.status', 'sedang berjalan')
                    ->orWhere('checkouts.status', 'selesai');
            })
            ->orderBy('jobs.company_id')
            ->get();


        $pdf2 = PDF::loadView('admin.report.adviser.lampiran', ['data' => $data, 'no_surat' => $no_surat])
        ->setPaper('a4', 'landscape')
        ->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);

        $nama_file = 'Laporan_Data_Dosen_Pendamping.pdf';
        $m->addRaw($pdf2->output());
        return response($m->merge())
                ->withHeaders([
                    'Content-Type' => 'application/pdf',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$nama_file,
                ]);
    }
}
