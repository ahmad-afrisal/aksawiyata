@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Posisi</li>
          <li class="breadcrumb-item active">Detail Posisi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
  
        <!-- Left side columns -->
        <!-- Sales Card -->
        <div class="col-12">
            <div class="card info-card sales-card">
              <div class="filter">
                @if ($job->status)
                  <button type="button" class="btn btn-sm btn-success">Terbuka &nbsp </button>
                @else
                  <button type="button" class="btn btn-sm btn-danger">Tertutup &nbsp </button>
                @endif
              </div>

              <div class="card-body">
                <h5 class="card-title">Detail Posisi</h5>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <img src="{{ asset('backend/assets/img/logo.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="ps-3">
                              <h6>{{ $job->name  }} | <span class="text-muted">{{ $job->company->name }}</span></h6>
                              <span class="{{ $job->status ? 'text-success' : 'text-danger'}} small pt-1 fw-bold">{{ $job->status ? 'Terbuka' : 'Tertutup' }}</span> <span class="text-muted small pt-2 ps-1">untuk {{ $job->quota }} orang pendaftar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="text-align: justify">
                        <h5 class="card-title">Deskripsi Kegiatan</h5>
                        {!! $job->develop_competencies !!}
                        <h5 class="card-title">Kompetensi yang Dikembangkan</h5>
                        {!! $job->develop_competencies !!}
                        <h5 class="card-title">Kriteria Peserta</h5>
                        {!! $job->participant_criteria !!}
                        <h5 class="card-title">Informasi Tambahan</h5>
                        {!! $job->additional_information !!}
                        
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('admin.job.edit', $job->id)}}" class="btn btn-primary" >Edit Data</a>
                      </div>                  
                    </div>
                </div>

                
              </div>

            </div>
          </div><!-- End Sales Card -->
        <!-- End Left side columns -->
      </div>
    </section>
  

</main><!-- End #main -->




@endsection

