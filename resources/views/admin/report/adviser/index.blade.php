@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Laporan</li>
        <li class="breadcrumb-item active">Dosen Pembimbing</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-12 mb-3">
            <!-- Vertically centered Modal -->
            <div class="d-grid gap-2">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" type="button">Cetak Surat Keputusan</button>
            </div>
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
              Vertically centered
            </button> --}}
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <form action="{{ route('admin.report.adviser.sk') }}" method="post">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title">Masukkan No Surat</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="col-12">
                        <input type="text" class="form-control  {{$errors->has('no_surat') ? 'is-invalid' : ''}}"  value="{{old('no_surat') ?: ''}}" id="no_surat" name="no_surat"  required>
                        @if ($errors->has('no_surat'))
                          <div class="invalid-feedback">
                              {{$errors->first('no_surat')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="sumbit" class="btn btn-primary">Cetak</button>
                    </div>
                  </form>
                </div>
              </div>
            </div><!-- End Vertically centered Modal-->

        </div>

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              {{-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6><a href="{{ route('admin.report.adviser.lampiran') }}" target="_blank">Cetak Lampiran</a></h6>
                    <h6><a href="{{ route('admin.report.adviser.sk') }}" target="_blank">Cetak SK</a></h6>
                  </li>

                </ul>
              </div> --}}

              <div class="card-body pb-0">
                <h5 class="card-title">Mahasiswa <span>| Dosen Pembimbing</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama Mahasiswa</th>
                      <th scope="col">Nama Perusahaan / Instansi</th>
                      <th scope="col">Dosen Pendamping</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($students as $student)
                    <tr>
                      <th scope="row">
                        {{ $loop->iteration}}
                      </th>
                      <td>{{ $student->User->Student->nim_mhs }}</td>
                      <td>{{ $student->User->Student->nama_mhs }}</td>
                      <td class="fw-bold">{{ $student->Job->Company->name }}</td>
                      <td>{{ $student->Job->Company->Adviser->Lecture->nama_dosen }}</td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="5">Belum Ada Mahasiwa Terdaftar</td>
                        </tr>
                    @endforelse
                   

                  </tbody>
                </table>

              </div> 

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->


  {{-- Diproses | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

