@extends('layouts.app-dashboard')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            @forelse ($checkouts as $checkout)
            <div class="col-xxl-4 col-md-6">
              <a href="tets.html">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">{{ $checkout->status }}</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $checkout->Job->name }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{  $checkout->Job->Company->name }}</span> | <span class="text-muted small pt-2 ps-1">{{  $checkout->Job->Company->regency }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @empty
                <h5>Belum melakukan pendaftaran</h5>
            @endforelse

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->
  {{-- Diproses | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

