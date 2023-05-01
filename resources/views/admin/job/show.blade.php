@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Posisi</li>
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
                <a class=" btn btn-sm btn-success" href="{{ route('admin.job.create')}}">Terbuka &nbsp </a>
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
                              <h6>Full Stack Web Developer | <span class="text-muted">Bangk.id</span></h6>
                              <span class="text-success small pt-1 fw-bold">Terbuka</span> <span class="text-muted small pt-2 ps-1">untuk 10 orang pendaftar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="text-align: justify">
                        <h5 class="card-title">Deskripsi Kegiatan</h5>
                        <p class="small">Seorang full stack web developer bertanggung jawab untuk mengembangkan sebuah website secara keseluruhan, baik dari sisi front-end maupun back-end. Pekerjaan seorang full stack web developer meliputi beberapa tugas antara lain membangun website dari awal hingga selesai, memastikan website yang dibuat responsif dan mudah diakses di berbagai perangkat, dan mengoptimalkan kinerja website agar dapat diakses dengan cepat. </p>
                        <h5 class="card-title">Kompetensi yang Dikembangkan</h5>
                        <p class="small">Commit & Push Kode, Review Kode, Implementasi API, Unit tes kode, kolaborasi antar divisi.</p>
                        <h5 class="card-title">Kriteria Peserta</h5>
                        <p class="small">
                          Jurusan: Teknologi Informasi, Informatika, Ilmu Komputer, atau Jurusan yang Berkaitan<br>Jenjang: D3 / D4 / S1, <br>Semester: Minimal semester 6
                          Kriteria:
                          - Memiliki kemampuan GIT
                          - Memiliki kemampuan Javascript
                          - Memiliki kemampuan Python
                          - Memiliki Kemampuan SQL (MySQL, PostgreSQL)
                          
                          
                          Kriteria soft skills:
                          - Komunikasi
                          - Bekerja dalam tim
                          - Memiliki inisiatif tinggi
                          - Negosiasi
                          - Berpikir strategis.</p>
                        <h5 class="card-title">Informasi Tambahan</h5>
                        <p class="small">Sehat jasmani dan rohani serta siap melaksanakan program magang secara offline di kantor PT Widya Inovasi Indonesia.</p>
                        
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('admin.job.edit', 1)}}" class="btn btn-primary" >Edit Data</a>
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

