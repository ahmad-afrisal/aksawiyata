
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Aksawiyata</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Aksawiyata</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun Mahasiswa</h5>
                    <p class="text-center small">Jelajah Lebih jauh</p>
                  </div>
                  @include('components.alert')

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="col-12">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <div class="input-group has-validation">
                        <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{old('name') ?: ''}}" id="name" required>
                        @if ($errors->has('name'))
                          <div class="invalid-feedback">
                            {{$errors->first('name')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="nim" class="form-label">NIM</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nim" class="form-control {{$errors->has('nim') ? 'is-invalid' : ''}}"  value="{{old('nim') ?: ''}}" id="nim" required>
                        @if ($errors->has('nim'))
                          <div class="invalid-feedback">
                            {{$errors->first('nim')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"  value="{{old('email') ?: ''}}" id="email" required>
                        @if ($errors->has('email'))
                          <div class="invalid-feedback">
                            {{$errors->first('email')}}
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="yourPassword" required>
                      @if ($errors->has('password'))
                        <div class="invalid-feedback">
                          {{$errors->first('password')}}
                        </div>
                      @endif
                    </div>

                    <div class="col-12">
                      <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" id="password_confirmation" required>
                      @if ($errors->has('password_confirmation'))
                          <div class="invalid-feedback">
                            {{$errors->first('password_confirmation')}}
                          </div>
                        @endif
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Login dengan google? </p>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('user.login.google') }}" class="btn btn-secondary w-100"><i class="bi bi-google"></i> Google</a>
                      </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

</html>