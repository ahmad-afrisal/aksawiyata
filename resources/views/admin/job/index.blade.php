@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Posisi</li>
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
  
                <div class="filter">
                  <a class=" btn btn-sm btn-success" href="{{ route('admin.job.create')}}">Tambah Posisi <i class="bi bi-building-add"></i></a>
                </div>
  
                <div class="card-body pb-0">
                  <h5 class="card-title">Posisi <span>| {{ $jobsCount}}</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Posisi</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Kuota</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($jobs as $job)
                      <tr>
                        <td></td>
                        <th scope="row">{{ $job->name}}</th>
                        <td><a href="{{ $job->Company->website_link}}" target="_blank" class="text-primary fw-bold">{{ $job->Company->name}}</a></td>
                        <td class="fw-bold">{{ $job->quota}}</td>
                        <td>
                          @if ($job->status)
                            <span class="badge bg-success">Terbuka</span>
                          @else
                            <span class="badge bg-danger">Tutup</span>
                              
                          @endif
                          
                        </td>
                        <td>
                          <a href="{{route('admin.job.show',$job->id)}}" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                          <a href="{{route('admin.job.edit',$job->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        </td>
                      </tr>
                      @empty
                          <tr>
                            <td colspan="6">Belum Ada perusahaan terdaftar</td>
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

