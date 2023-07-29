@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan Akhir</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
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
                      {{-- <th scope="col">Posisi</th>
                      <th scope="col">Perusahaan</th> --}}
                      <th scope="col">Tanggal Upload</th>
                      <th scope="col">Laporan Akhir</th>
                      <th scope="col">Status</th>
                      <th scope="col" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($reports as $report)
                      <tr>
                        <th scope="row"><a href="#">{{ $report->User->Student->nim_mhs }}</a></th>
                        <td>{{ $report->User->Student->nama_mhs }}</td>
                        {{-- <td>{{ $report->User-> }}</td> --}}
                        {{-- <td>Bangk.id</td> --}}
                        <td>{{ (date_format($report->created_at, 'd-m-Y')) }}</td>
                        <td><a href="{{ Storage::url($report->report ?? '')}}" class="text-primary">Download</a></td>
                        <td>
                          @if ($report->status == "Belum Upload")
                            <span class="badge bg-info text-dark">Belum Upload</span>
                          @elseif($report->status == "Sedang Diperiksa")
                            <span class="badge bg-warning text-dark">Sedang Diperiksa</span>
                          @elseif($report->status == "Diterima")
                            <span class="badge bg-success text-white">Diterima</span>
                          @elseif($report->status == "Ditolak")
                            <span class="badge bg-danger text-white">Ditolak</span>
                          @endif
                        </td>
                          <td>
                            <form action="{{ route('admin.final-report.update-reject', $report->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-exclamation-octagon"></i></button>
                            </form>
                          </td>
                        <td>
                          <form action="{{ route('admin.final-report.update-accept', $report->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i></button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="9">Belum ada laporan</td>
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

</main>
<!-- End #main -->


@endsection

