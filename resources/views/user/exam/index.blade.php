@extends('layouts.app-dashboard')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Jadwal Ujian</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
  
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            @include('components.alert')
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Jadwal Ujian <span>|</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Waktu Ujian</th>
                        <th scope="col">Tempat Ujian</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($schedules as $schedule)
                      <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $schedule->exam_date }}</td>
                        <td>{{ $schedule->place }}</td>
                        <td>
                          <form action="{{route('user.examinee.store', $schedule->id)}}" method="POST">
                            @csrf
                              
                            <button class="btn btn-warning">Daftar</button>
                          </form>
                        </td>
                      </tr>
                      @empty
                          <tr>
                            <td colspan="3">Belum Ada Jadwal</td>
                          </tr>
                      @endforelse

                    </tbody>
                  </table>
  
                </div>
  
              </div>
            </div><!-- End Top Selling -->
          </div>
          <div class="row">
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Riwayat Daftar <span>|</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Waktu Ujian</th>
                        <th scope="col">Tempat Ujian</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($histories as $history)
                      <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $history->Schedule->exam_date }}</td>
                        <td>{{ $history->Schedule->place }}</td>
                        <td>{{ $history->created_at }}</td>
                        <td>
                          @if ($history->is_accepted == 0) 
                            <span class="badge border-danger border-1 text-danger">Ditolak</span>
                          @elseif ($history->is_accepted == 1)
                            <span class="badge border-success border-1 text-success">Disetujui</span>
                          @else
                            <span class="badge border-warning border-1 text-warning">Menunggu</span>
                          @endif
                        </td> 
                      </tr>
                      @empty
                          <tr>
                            <td colspan="3">Belum Pernah Mendaftar</td>
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

