@extends('layouts.app-dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              @if (Auth::user()->avatar)
                <img src="{{Auth::user()->avatar}}" class="rounded-circle" alt="" srcset="">
              @else
                <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class=" rounded-circle" alt="" srcset="">
              @endif
              <h2>{{ Auth::user()->name}}</h2>
              <h3>{{ Auth::user()->nim}}</h3>
              <div class="social-links mt-2">
                <a href="{{ Auth::user()->instagram_profile ?? ''}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ Auth::user()->linkedin_profile ?? ''}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="{{ Auth::user()->github_profile ?? ''}}" target="_blank" class="github"><i class="bi bi-github"></i></a>
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

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-portfolio">Portofolio</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tentang</h5>
                  <p class="small fst-italic">{{ Auth::user()->about }}.</p>

                  <h5 class="card-title">Data Diri </h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIM</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->nim }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Konsentrasi</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->concentration }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_number }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Transkip</div>
                    <div class="col-lg-9 col-md-8"><a href="{{ Storage::url(Auth::user()->transkip ?? '')}}">{{ $transkip ?? ''}}</a></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">CV</div>
                    <div class="col-lg-9 col-md-8"><a href="{{ Storage::url(Auth::user()->cv ?? '')}}">{{ $cv ?? ''}}</a></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{ route('user.update-profile', Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ Auth::user()->name }}" required>
                        @if ($errors->has('name'))
                          <div class="invalid-feedback">
                            {{$errors->first('name')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nim" class="col-md-4 col-lg-3 col-form-label">NIM</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nim" type="text" class="form-control {{$errors->has('nim') ? 'is-invalid' : ''}}" value="{{ Auth::user()->nim }}" required>
                        @if ($errors->has('nim'))
                          <div class="invalid-feedback">
                            {{$errors->first('nim')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="concentration" class="col-md-4 col-lg-3 col-form-label">Konsentrasi</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select {{$errors->has('concentration') ? 'is-invalid' : ''}}" id="concentration" name="concentration" aria-label="Default select example" required>
                          <option value="{{ Auth::user()->concentration}} ">{{ Auth::user()->concentration}}</option>
                          <option value="Jaringan">Jaringan</option>
                          <option value="RPL">RPL</option>
                          <option value="Sistem Cerdas">Sistem Cerdas</option>
                        </select>
                        @if ($errors->has('concentration'))
                          <div class="invalid-feedback">
                            {{$errors->first('concentration')}}
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
                        <input  type="text"  name="github_profile" class="form-control {{$errors->has('github_profile') ? 'is-invalid' : ''}}"  value="{{ Auth::user()->github_profile}}">
                        @if ($errors->has('github_profile'))
                          <div class="invalid-feedback">
                            {{$errors->first('github_profile')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-portfolio">
                  <!-- Change Password Form -->
                  <form method="post"  action="{{ route('user.update-profile', Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="transkip" class="col-md-4 col-lg-3 col-form-label">Transkip Akademik</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control {{$errors->has('transkip') ? 'is-invalid' : ''}}"   name="transkip" type="file" id="transkip">
                        <p class="text-muted small pt-2">Link Download : <a href="{{ Storage::url(Auth::user()->transkip ?? '')}}" target="_blank">{{ $transkip ?? ''}}</a></p>
                        @if ($errors->has('transkip'))
                          <div class="invalid-feedback">
                            {{$errors->first('transkip')}}
                          </div>
                        @endif

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="cv" class="col-md-4 col-lg-3 col-form-label">Curriculum Vitae (CV)</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control {{$errors->has('cv') ? 'is-invalid' : ''}}"  name="cv" type="file" id="cv">
                        <p class="text-muted small pt-2">Link Download : <a href="{{ Storage::url(Auth::user()->cv ?? '')}}" target="_blank">{{ $cv ?? ''}}</a></p>
                        @if ($errors->has('cv'))
                          <div class="invalid-feedback">
                            {{$errors->first('cv')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
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