@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dosen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Pengguna</li>
        <li class="breadcrumb-item active">Dosen</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            @include('components.alert')
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Data</h5>
  
                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('admin.lectures.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12 col-lg-6">
                    <label for="text" class="form-label">Username</label>
                    <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"  value="{{ old('username') ?: ''}}"  pattern="^\S+" title="username tidak boleh mengandung spasi." id="username" name="username">
                    @if ($errors->has('username'))
                      <div class="invalid-feedback">
                        {{$errors->first('username')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="text" class="form-label">Nama Dosen</label>
                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{ old('name') ?: ''}}" id="name" name="name">
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                        {{$errors->first('name')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"  value="{{old('email') ?: ''}}" id="email" name="email">
                    @if ($errors->has('email'))
                      <div class="invalid-feedback">
                        {{$errors->first('email')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"  value="{{old('password') ?: ''}}" id="password" name="password">
                    @if ($errors->has('password'))
                      <div class="invalid-feedback">
                        {{$errors->first('password')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"  value="{{old('password_confirmation') ?: ''}}" id="password_confirmation" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                      <div class="invalid-feedback">
                        {{$errors->first('password_confirmation')}}
                      </div>
                    @endif
                  </div>

                  <div class="col-12 col-lg-6">
                    <label for=""></label>
                    <div class="d-grid gap-2 mt-lg-2">
                      <button type="submit" class="btn btn-primary">Tambah Dosen</button>
                    </div>                  
                  </div>
                </form>
                <!-- End floating Labels Form -->
  
              </div>
            </div>
          </div>

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Pengguna <span>| {{ $lecturesCount }}</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Foto</th>
                      <th scope="col">Username</th>
                      <th scope="col">Nama Dosen</th>
                      <th scope="col">Email</th>
                      {{-- <th scope="col">Aksi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($lectures as $lecture)
                    <tr>
                      <th scope="row">
                        @if ($lecture->User->avatar)
                          <img src="{{$lecture->User->avatar}}" class="rounded-circle" alt="" srcset="">
                        @else
                          <img src="https://ui-avatars.com/api/?name={{$lecture->User->username}}" class=" rounded-circle" alt="" srcset="">
                        @endif
                      </th>
                      <td>{{ $lecture->User->username }}</td>
                      <td class="fw-bold">{{ $lecture->nama_dosen }}</td>
                      <td>{{ $lecture->User->email }}</td>
                      {{-- <td><a href="{{ route('admin.users.show', $lecture->id)}}" class="btn btn-info"><i class="bi bi-info-circle"></i></a></td> --}}
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6">Belum Ada Dosen terdaftar</td>
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

