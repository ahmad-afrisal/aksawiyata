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
                  <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class=" rounded-circle" alt="" srcset="">
              @endif
              <h2>{{ Auth::user()->name}}</h2>
              <h3>
                @if ( Auth::user()->is_admin)
                    Admin
                @endif
              </h3>
              <div class="social-links mt-2">
                <a href="{{ Auth::user()->instagram_profile}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ Auth::user()->linkedin_profile}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="{{ Auth::user()->github_profile}}" target="_blank" class="github"><i class="bi bi-github"></i></a>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Diri</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Data Diri</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tentang</h5>
                  <p class="small fst-italic">{{ Auth::user()->about}}.</p>

                  <h5 class="card-title">Data Diri</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_number}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{ route('admin.update-profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="avatar" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                      <div class="col-md-9">
                        @if (Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar ?? '')}}" class="img-preview" alt="" srcset="">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class="img-preview" alt="" srcset="">
                        @endif
                        <div class="pt-2">
                          <input name="avatar" type="file" class="form-control {{$errors->has('avatar') ? 'is-invalid' : ''}}" onchange="previewImg()" id="sampul" >
                          @if ($errors->has('avatar'))
                            <div class="invalid-feedback">
                              {{$errors->first('avatar')}}
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ Auth::user()->name }}">
                        @if ($errors->has('name'))
                          <div class="invalid-feedback">
                            {{$errors->first('name')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Tentang</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control {{$errors->has('about') ? 'is-invalid' : ''}}" id="about" style="height: 100px">{{ Auth::user()->about}}</textarea>
                        @if ($errors->has('about'))
                          <div class="invalid-feedback">
                            {{$errors->first('about')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone_number" type="text" class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}"  value="{{ Auth::user()->phone_number}}">
                        @if ($errors->has('phone_number'))
                          <div class="invalid-feedback">
                            {{$errors->first('phone_number')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="instagram_profile" class="col-md-4 col-lg-3 col-form-label">Profil Instagram</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram_profile" type="text" class="form-control {{$errors->has('instagram_profile') ? 'is-invalid' : ''}}" value="{{ Auth::user()->instagram_profile }}">
                        @if ($errors->has('instagram_profile'))
                          <div class="invalid-feedback">
                            {{$errors->first('instagram_profile')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="linkedin_profile" class="col-md-4 col-lg-3 col-form-label">Profil Linkedin</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin_profile" type="text" class="form-control {{$errors->has('linkedin_profile') ? 'is-invalid' : ''}}"  value="{{ Auth::user()->linkedin_profile}}">
                        @if ($errors->has('linkedin_profile'))
                          <div class="invalid-feedback">
                            {{$errors->first('linkedin_profile')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="github_profile" class="col-md-4 col-lg-3 col-form-label">Profil Github</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="github_profile" type="text" class="form-control {{$errors->has('linkedin_profile') ? 'is-invalid' : ''}}" id="github_profile" value="{{ Auth::user()->linkedin_profile}}">
                        @if ($errors->has('linkedin_profile'))
                          <div class="invalid-feedback">
                            {{$errors->first('linkedin_profile')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="{{ route('password.update') }}" >
                    @csrf
                    @method('put')
            
                    <div class="row mb-3">
                      <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="current_password" name="current_password" type="password" autocomplete="current-password" required  class="form-control" >
                        @if ($errors->has('current_password'))
                          <p class="text-danger">{{ $errors->first('current_password') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="password" name="password" type="password" autocomplete="new-password" required  class="form-control" >
                        @if ($errors->has('current_password'))
                          <p class="text-danger">{{ $errors->first('current_password') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="password_confirmation" name="password_confirmation" type="password" required  autocomplete="new-password" class="form-control">
                        @if ($errors->has('current_password'))
                          <p class="text-danger">{{ $errors->first('current_password') }}</p>
                        @endif
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ubah Password</button>
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

