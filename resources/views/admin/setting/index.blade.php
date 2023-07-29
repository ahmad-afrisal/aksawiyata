@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengaturan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        @include('components.alert')
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @if (Auth::user()->avatar)
                  <img src="{{ Storage::url(Auth::user()->avatar ?? '')}}" class="rounded-circle" alt="" srcset="">
              @else
                  <img src="https://ui-avatars.com/api/?name={{Auth::user()->Admin->name}}" class=" rounded-circle" alt="" srcset="">
              @endif
              <h2>{{ Auth::user()->Admin->name}}</h2>
              <h3>
                Admin
              </h3>
              {{-- <div class="social-links mt-2">
                <a href="{{ Auth::user()->instagram_profile}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ Auth::user()->linkedin_profile}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="{{ Auth::user()->github_profile}}" target="_blank" class="github"><i class="bi bi-github"></i></a>
              </div> --}}
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Data Diri</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">


                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{ route('admin.update-profile')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ Auth::user()->Admin->name }}">
                        @if ($errors->has('name'))
                          <div class="invalid-feedback">
                            {{$errors->first('name')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label  class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade profile-change-password pt-3 " id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post"  action="{{ route('admin.update-password', Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"  value="{{ Auth::user()->username ?? ''}}"  name="username" type="text" id="username" required>
                        @if ($errors->has('username'))
                          <div class="invalid-feedback">
                            {{$errors->first('username')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"  name="password" type="password" id="password">
                        @if ($errors->has('password'))  
                          <div class="invalid-feedback">
                            {{$errors->first('password')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" value=""  name="password_confirmation" type="password" id="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                          <div class="invalid-feedback">
                            {{$errors->first('password_confirmation')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div> 

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  

@endsection

