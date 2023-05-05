@extends('layouts.app-dashboard')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Perusahaan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Kegiatan Aktif</li>
        <li class="breadcrumb-item active">Logbook</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                <h5 class="card-title">Logbook </h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Kegiatan</th>
                      <th scope="col">Detail Kegiatan</th>
                        <th scope="col">Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($logbooks as $logbook)
                    <tr>
                      <th scope="row">
                        {{ $loop->iteration }}
                      </th>
                      <td class="fw-bold">{{ (date_format($logbook->created_at,'Y-m-d')) }}</td>
                      <td class="fw-bold">{{ $logbook->activity }}</td>
                      <td>{{ $logbook->detail_activity }}</td>
                      <td>
                        <img src="{{  Storage::url($logbook->photo ?? '') }}" alt="" srcset="">
                      </td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6">Belum Mengisi Logbook</td>
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

@endsection

