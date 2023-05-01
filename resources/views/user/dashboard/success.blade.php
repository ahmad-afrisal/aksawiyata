@extends('layouts.app-dashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
    <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Posisi</li>
                <li class="breadcrumb-item">Konfirmasi</li>
                <li class="breadcrumb-item active">Sukses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <!-- Left side columns -->
          <div class="col-lg-12">
              <div class="row">
                  <!-- Revenue Card -->
                  <div class="col-xxl-12 col-md-12">
                      <a href="tets.html">
                          <div class="card info-card revenue-card">
                              <div class="card-body">
                                  <div class="d-flex align-items-center justify-content-center text-center">
                                      <div class="ps-3">
                                        <img src="{{ asset('backend/assets/img/done.svg') }}" class="py-5" alt="Done" style="height: 300px">
                                        <h6>Selamat!, Mengikuti Magang</h6>
                                        <span class="text-muted small pt-2 ps-1">Sekarang anda telah terdaftar sebagai peserta magang, jangan sia-siakan kesempatan ini</span>  
                                        <br><a href="{{route('user.activity.index')}}" class="btn btn-secondary mt-2">Kegiatan Aktif</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  <!-- End Revenue Card -->
              </div>
          </div><!-- End Left side columns -->
      </div>
  </section>



</main><!-- End #main -->

@endsection
