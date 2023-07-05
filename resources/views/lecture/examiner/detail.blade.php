@extends('layouts.lecture')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h5 class="card-title">Pendaftar <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Status</th>
                      <th scope="col">Penilaian</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($checkouts as $checkout)
                      <tr>
                        <th scope="row"><a href="#">{{$checkout->User->nim}}</a></th>
                        <td>{{$checkout->User->name }}</td>
                        <td>{{$checkout->Job->name }}</td>
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
                          <a href="{{ route('lecture.examiner.assesment', $checkout->User->nim) }}" class="btn btn-primary btn-sm">Beri Nilai</a>
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


        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->


  {{-- | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

