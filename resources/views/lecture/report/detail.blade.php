@extends('layouts.lecture')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome')}}">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Laporan Mahasiswa</li>
        <li class="breadcrumb-item active">Detail</li>
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
                <h5 class="card-title">Riwayat Bimbingan <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Perusahaan</th>
                      <th scope="col">File Laporan</th>
                      <th scope="col">Status</th>
                      <th scope="col" colspan="2">Menu</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($reports as $report)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $report->created_at }}</td>
                        <td>{{ $report->User->name }}</td>
                        <td>{{ $report->User->nim }}</td>
                        <td>{{ $report->Job->name }}, {{ $report->Job->Company->name }}</td>
                        <td><a href="{{ Storage::url($report->report ?? '')}}">Lihat</a></td>
                        <td> 
                          @if ($report->status == "Ditolak") 
                            <span class="badge border-danger border-1 text-danger">Ditolak</span>
                          @elseif ($report->status == "Diterima")
                            <span class="badge border-success border-1 text-success">Disetujui</span>
                          @else
                            <span class="badge border-warning border-1 text-warning">Sedang Diperiksa</span>
                          @endif
                        </td>
                        <td>
                          <form action="{{ route('lecture.report.accepted', $report->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                          </form>
                        </td>
                        <td>
                          <form action="{{ route('lecture.report.rejected', $report->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6">Belum Ada Bimbingan</td>
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

