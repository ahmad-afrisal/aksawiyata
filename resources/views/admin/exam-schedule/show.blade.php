@extends('layouts.admin')

@section('content')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ujian</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Jadwal Ujian</li>
                <li class="breadcrumb-item active">Pendaftar</li>
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
                        <h5 class="card-title">Peserta Ujian <span>|</span></h5>
        
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Waktu Ujian</th>
                                    <th scope="col">Tempat Ujian</th>
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Perusahaan</th>
                                    <th scope="col">Pendaftar</th>
                                    <th scope="col">Status</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @forelse ($examinees as $examinee)
                                <tr>
                                  <th scope="row">{{ $loop->iteration}}</th>
                                  <td>{{ $examinee->Schedule->exam_date }}</td>
                                  <td>{{ $examinee->Schedule->place }}</td>
                                  <td>{{ $examinee->created_at }}</td>
                                  <td>{{ $examinee->Checkout->Job->name }}</td>
                                  <td>{{ $examinee->Checkout->Job->Company->name }}</td>
                                  <td>{{ $examinee->Student->name }}</td>
                                  <td>
                                    @if ($examinee->is_accepted == 0) 
                                      <span class="badge border-danger border-1 text-danger">Ditolak</span>
                                    @elseif ($examinee->is_accepted == 1)
                                      <span class="badge border-success border-1 text-success">Disetujui</span>
                                    @else
                                      <span class="badge border-warning border-1 text-warning">Menunggu</span>
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
                    </div><!-- End Top Selling -->
        
                </div>
                </div><!-- End Left side columns -->
        
            </div>
        </section>
    

    </main>

@endsection

