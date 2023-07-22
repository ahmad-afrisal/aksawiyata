@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
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
                  <a class=" btn btn-sm btn-success" href="{{ route('admin.company.create')}}">Tambah Perusahaan <i class="bi bi-building-add"></i></a>
                </div>
  
                <div class="card-body pb-0">
                  <h5 class="card-title">Perusahaan <span>| {{ $companiesCount}}</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Logo</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Pimpinan</th>
                        <th scope="col">Jumlah Karyawan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($companies as $company)
                      <tr>
                        <th scope="row">
                          @if ($company->logo)
                              <img src="{{ asset('/storage/'.$company->logo) }}"  alt="" srcset="">
                          @else
                              <img src="https://ui-avatars.com/api/?name={{$company->logo}}" class=" rounded-circle" alt="" srcset="">
                          @endif
                        </th>
                        <td><a href="{{ $company->website_link }}" target="_blank" class="text-primary fw-bold">{{$company->name}}</a></td>
                        <td class="fw-bold">{{ $company->ceo }}</td>
                        <td>{{ $company->number_of_employees }}</td>
                        <td>{{ $company->regency.', '.$company->province }}</td>
                        <td>
                          <a href="{{route('admin.company.show',$company->id)}}" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                          <a href="{{route('admin.company.edit',$company->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
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

