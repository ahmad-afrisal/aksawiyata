@extends('layouts.app-dashboard')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            @include('components.alert')

            @forelse ($checkouts as $checkout)
            <div class="col-xxl-4 col-md-6">
              
              <a href="{{ route('user.confirm')}}">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title ">
                    @if ($checkout->status == "sudah daftar")
                      <span class="badge bg-light text-success">Sudah Daftar </span>
                    @elseif ($checkout->status == "ditolak")
                      <span  class="badge bg-danger">Di Tolak</span>
                    @elseif ($checkout->status == "terima tawaran")
                      <span class="badge bg-warning ">Terima Tawaran</span>
                    @elseif ($checkout->status == "sedang berjalan")
                      <span class="badge bg-success">Sedang Berjalan</span>
                    @else
                      <span class="badge bg-info">Selesai</span>
                    @endif
                  </h5>
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

          </div><!-- End Left side columns -->
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  {{-- Diproses | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

