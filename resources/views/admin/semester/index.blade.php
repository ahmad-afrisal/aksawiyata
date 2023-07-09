@extends('layouts.admin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Semester</li>
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
  
                <div class="filter">
                  <a class=" btn btn-sm btn-success" href="{{ route('admin.semester.create')}}">Tambah Semester <i class="bi bi-building-add"></i></a>
                </div>
  
                <div class="card-body pb-0">
                  <h5 class="card-title">Tingkat Semester <span>|</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tingkat Semester</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($semesters as $semester)
                      <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $semester->name }}</td>
                        <td>
                          <a href="{{route('admin.semester.edit',$semester->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        </td>
                      </tr>
                      @empty
                          <tr>
                            <td colspan="3">Belum Ada Data</td>
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

