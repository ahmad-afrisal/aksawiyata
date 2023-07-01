@extends('layouts.mentor')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Posisi Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Posisi</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $jobsCount }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Posisi Card -->

          <!-- Pengguna Card -->
          <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Mahasiswa Magang</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    {{-- <h6>{{ $users }}</h6> --}}
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Pengguna Card -->

          @include('components.alert')
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Daftar Posisi <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Perusahaan</th>
                      <th scope="col">Menu</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($jobs as $item)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <th scope="row">{{ $item->name}}</th>
                      <td><a href="{{ $item->Company->website_link}}" target="_blank" class="text-primary fw-bold">{{ $item->Company->name}}</a></td>
                      <td>
                        <a href="{{route('mentor.detail', $item->id)}}" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                      </td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6">Belum Ada Posisi Terbuka</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table> 

              </div>

            </div>
          </div><!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->


  {{-- | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

