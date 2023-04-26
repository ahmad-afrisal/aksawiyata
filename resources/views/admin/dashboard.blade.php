@extends('layouts.admin')

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

          <!-- Perusahaan Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Perusahaan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Perusahaan Card -->

          <!-- Posisi Card -->
          <div class="col-xxl-4 col-md-4">
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
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>264</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Posisi Card -->

          <!-- Pengguna Card -->
          <div class="col-xxl-4 col-md-4">

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
                <h5 class="card-title">Pengguna</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>144</h6>
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

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Pendaftar <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Perusahaan</th>
                      <th scope="col">Tanggal Daftar</th>
                      <th scope="col">Transkip</th>
                      <th scope="col">CV</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($checkouts as $checkout)
                      <tr>
                        <th scope="row"><a href="#">{{$checkout->User->nim}}</a></th>
                        <td>{{$checkout->User->name }}</td>
                        <td>{{$checkout->Job->name }}</td>
                        <td>{{$checkout->Job->Company->name }}</td>
                        <td>{{ $checkout->created_at->format('M d Y') }}</td>
                        <td><a href="{{$checkout->User->transkip}}" class="text-primary">Lihat</a></td>
                        <td><a href="{{$checkout->User->cv}}" class="text-primary">Lihat CV</a></td>
                        <td>
                          @if ($checkout->status == "sudah daftar")
                            <span class="badge bg-info">Sudah Daftar</span>
                          @elseif ($checkout->status == "ditolak")
                            <span class="badge bg-danger">Di Tolak</span>
                          @elseif ($checkout->status == "terima tawaran")
                            <span class="badge bg-warning">Terima Tawaran</span>
                          @elseif ($checkout->status == "sedang berjalan")
                            <span class="badge bg-success">Sedang Berjalan</span>
                          @else
                            <span class="badge bg-light">Selesai</span>
                          @endif
                        </td>
                        <td>
                          {{-- <form action="" method="post">
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-exclamation-octagon"></i></button>
                          </form> --}}
                          @if ($checkout->status == "sudah daftar")
                            <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i></button>
                            </form>
                          @endif
                          
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="9">Belum ada pendaftar</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          {{-- 
                      <td><span class="badge bg-danger">Rejected</span></td>
                      <td><span class="badge bg-warning">Pending</span></td>
                      <td><span class="badge bg-success">Approved</span></td>
                      <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                      <button type="button" class="btn btn-warning"><i class="bi bi-exclamation-triangle"></i></button>
                      <button type="button" class="btn btn-info"><i class="bi bi-info-circle"></i></button
            
            --}}


        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->


  {{-- | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

