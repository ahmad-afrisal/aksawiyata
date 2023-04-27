@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
          <li class="breadcrumb-item active">Detail Perusahaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
  
        <!-- Left side columns -->
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">


              <div class="card-body">
                <h5 class="card-title">Detail Perusahaan</h5>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <img src="{{ asset('backend/assets/img/logo.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="ps-3">
                              <h6>Bangk.id</h6>
                              <span class="text-muted small pt-2 ps-1">Jl. Poros Majene Mamuju No 39, Kec. Banggae Timur, Kab. Majene, Sulawesi Barat. 91545</span>
                            </div>
                          </div>
                    </div>
                    <div class="col-12">
                        <h5 class="card-title">Tentang</h5>
                        <p class="small fst-italic">Bangk.id adalah perusahaan yang berfokus pada penyediaan pelatihan dan pengembangan keterampilan di bidang teknologi informasi. Startup ini dapat menawarkan berbagai jenis kursus dan program pelatihan, seperti pengembangan web, data science, keamanan siber, pengembangan aplikasi seluler, dan lain sebagainya.</p>

                        <h5 class="card-title">Profil Perusahaan</h5>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 label ">Pimpinan</div>
                            <div class="col-lg-8 col-md-6">: Kevin Anderson</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 label ">Jumlah Karyawan</div>
                            <div class="col-lg-8 col-md-6">: 10</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 label ">Link Website</div>
                            <div class="col-lg-8 col-md-6">: https://bangk.id</div>
                        </div>
                    </div>
                </div>

                
              </div>

            </div>
          </div><!-- End Sales Card -->
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Foto Perusahaan</h5>
    
                  <!-- Slides with indicators -->
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('backend/assets/img/slides-1.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('backend/assets/img/slides-2.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('backend/assets/img/slides-3.jpg') }}" class="d-block w-100" alt="...">
                      </div>
                    </div>
    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
    
                  </div><!-- End Slides with indicators -->
    
                </div>
              </div>
        </div><!-- End Right  side columns -->
  
      </div>
    </section>
  

</main><!-- End #main -->




@endsection

