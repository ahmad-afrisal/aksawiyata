@extends('layouts.app-dashboard')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Kegiatan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        @forelse ($checkouts as $checkout)
                            <!-- Sales Card -->
                        <div class="col-xxl-12 col-md-12">
                            <div class="card info-card sales-card">
                                <div class="card-body mt-4">
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$checkout->Job->Company->name}}</h6>
                                            <span class="text-success small pt-1 fw-bold">{{$checkout->Job->name}}</span>
                                            <br>
                                            <a href="{{ route('details', $checkout->Job->slug) }}" class="text-muted small pt-2">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Aktivitas</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <input class="form-control" type="file" id="formFile">
                                            <p class="text-muted small pt-2">Link Download : <a href="#">xxxx </a></p>
                                            <span class="text-muted small pt-2">Dokumen harus sesuai dengan </span><span class="text-success small pt-1 fw-bold">Template</span>, <span class="text-muted small pt-2">diisi sesuai petunjuk dan diunggah dalam format pdf dengan ukuran maksimal 5MB. Di upload setelah kegiatan KPI berakhir.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Akhir</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <input class="form-control" type="file" id="formFile">
                                            <p class="text-muted small pt-2">Link Download : <a href="#">xxxx </a></p>
                                            <span class="text-muted small pt-2">Dokumen harus sesuai dengan </span><span class="text-success small pt-1 fw-bold">Template</span>, <span class="text-muted small pt-2">diisi sesuai petunjuk dan diunggah dalam format pdf dengan ukuran maksimal 5MB. Di upload sebelum seminar KPI.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        @if ($checkout->status == "done")
                            <div class="col-xxl-12 col-md-12">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="">
                                                <h6>Selamat, kamu telah menyelesaikan program!</h6>
                                                <span class="text-muted small pt-2">Silahkan unduh sertifikat sebagai bukti keikutsertaan KPI</span>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary"><i class="bi bi-download me-1"></i> Unduh Sertifikat</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->
                        @endif

                        
                        @empty
                            <h3>Belum ada kegiatan yang di ikuti</h3>
                        @endforelse
                        

                        
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

@endsection
