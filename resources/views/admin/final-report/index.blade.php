@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan Akhir</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Laporan</li>
        <li class="breadcrumb-item active">Laporan Akhir</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

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
                <h5 class="card-title">Laporan Akhir <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Perusahaan</th>
                      <th scope="col">Tanggal Upload</th>
                      <th scope="col">Laporan Akhir</th>
                      <th scope="col">Status</th>
                      <th scope="col" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @forelse ($checkouts as $checkout) --}}
                      <tr>
                        <th scope="row"><a href="#">D0220374</a></th>
                        <td>Ahmad Afrisal</td>
                        <td>Full Stack Web Developer</td>
                        <td>Bangk.id</td>
                        <td>23 Apr 2023</td>
                        <td><a href="#" class="text-primary">Download</a></td>
                        <td>
                          {{-- <span class="badge bg-danger">Di Tolak</span> --}}
                          <span class="badge bg-success">Diterima</span>
                          {{-- <span class="badge bg-light">Selesai</span> --}}
                        </td>
                          <td>
                            <form action="" method="post">
                              @csrf
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-exclamation-octagon"></i></button>
                            </form>
                          </td>
                        <td>
                            {{-- @if ($checkout->status == "sudah daftar") --}}
                              <form action="#" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i></button>
                              </form>
                            {{-- @endif --}}
                            
                          </td>
                      </tr>
                    {{-- @empty --}}
                      <tr>
                        <td colspan="9">Belum ada pendaftar</td>
                      </tr>
                    {{-- @endforelse --}}
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

