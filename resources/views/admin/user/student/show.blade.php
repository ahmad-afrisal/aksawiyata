@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pengguna</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Pengguna</li>
                <li class="breadcrumb-item active">Detail Pengguna</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
              <div class="col-xl-4">
      
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
      
                    @if ($user->avatar)
                      <img src="{{$user->avatar}}" class="rounded-circle" alt="" srcset="">
                    @else
                      <img src="https://ui-avatars.com/api/?name={{$user->Student->nama_mhs}}" class=" rounded-circle" alt="" srcset="">
                    @endif
                    <h2>{{ $user->Student->nama_mhs}}</h2>
                    <h3>{{ $user->Student->nim_mhs}}</h3>
                    <div class="social-links mt-2">
                      <a href="https://instagram.com/{{ $user->Student->instagram_profile ?? ''}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                      <a href="https://linkedin/{{ $user->Student->linkedin_profile ?? ''}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                      <a href="https://github.com/{{ $user->Student->github_profile ?? ''}}" target="_blank" class="github"><i class="bi bi-github"></i></a>
                    </div>
                  </div>
                </div>
      
              </div>
      
              <div class="col-xl-8">
      
                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
      
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                      </li>
    
      
                    </ul>
                    <div class="tab-content pt-2">
      
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Tentang</h5>
                        <p class="small fst-italic">{{ $user->Student->about }}.</p>
      
                        <h5 class="card-title">Data Diri </h5>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                          <div class="col-lg-9 col-md-8">{{ $user->Student->nama_mhs }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">NIM</div>
                          <div class="col-lg-9 col-md-8">{{ $user->Student->nim_mhs }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Konsentrasi</div>
                          <div class="col-lg-9 col-md-8">{{ $user->Student->concentration }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                          <div class="col-lg-9 col-md-8">{{ $user->Student->phone_number }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Transkip</div>
                          <div class="col-lg-9 col-md-8"><a href="{{ $user->Student->transkip }}" target="_blank">Lihat Transkip</a></div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">CV</div>
                          <div class="col-lg-9 col-md-8"><a href="{{ $user->Student->cv }}" target="_blank">Lihat CV</a></div>
                        </div>
      
                      </div>
      
      
                    </div><!-- End Bordered Tabs -->
      
                  </div>
                </div>
      
              </div>
            </div>
          </section>
      
        </main><!-- End #main -->

@endsection