<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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
    * Template Name: NiceAdmin - v2.5.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    {{-- @include('notify::components.notify') --}}

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome')}}" class="logo d-flex align-items-center">
                <img src="{{ asset('backend/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Aksawiyata</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                @if (Auth::user()->avatar)
                    <img src="{{Storage::url(Auth::user()->avatar ?? '')}}" class="rounded-circle" alt="" srcset="">
                @else
                    <img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}" class=" rounded-circle" alt="" srcset="">
                @endif
               
                <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->username}}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>{{Auth::user()->username}}</h6>
                    <span>{{Auth::user()->nim}}</span>

                    @if (Auth::user()->role_id == 1)
                        <span>Admin</span>
                    @elseif (Auth::user()->role_id == 2)
                        <span>Dosen</span>
                    @elseif (Auth::user()->role_id == 3)
                        <span>Mentor</span>
                    @else
                        <span>Mahasiswa</span>
                    @endif

                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile')}}">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('contact')}}">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="#" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard')) ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/company*')) ? '' : 'collapsed' }}" href="{{ route('admin.company.index')}}">
                <i class="bi bi-buildings"></i>
                <span>Perusahaan</span>
            </a>
        </li><!-- End Perusahaan Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/job*')) ? '' : 'collapsed' }}" href="{{ route('admin.job.index')}}">
                <i class="bi bi-person-workspace"></i>
                <span>Posisi</span>
            </a>
        </li><!-- End Posisi Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/semester*')) ? '' : 'collapsed' }}" href="{{ route('admin.semester.index')}}">
                <i class="bi bi-card-list"></i>
                <span>Semester</span>
            </a>
        </li><!-- End Semster Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/exam-schedule*')) ? '' : 'collapsed' }}" href="{{ route('admin.exam-schedule.index')}}">
                <i class="bi bi-calendar-week"></i>
                <span>Jadwal Ujian</span>
            </a>
        </li>
        <!-- End Semster Page Nav --> 

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/users*')) ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a href="{{ route('admin.lectures.index')}}">
                    <i class="bi bi-circle"></i><span>Dosen</span>
                </a>
                </li>
                <li>
                <a href="{{ route('admin.mentors.index')}}">
                    <i class="bi bi-circle"></i><span>Mentor</span>
                </a>
                </li>
                <li>
                <a href="{{ route('admin.users.index')}}">
                    <i class="bi bi-circle"></i><span>Mahasiswa</span>
                </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->
        
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/final-report')) ? '' : 'collapsed' }}" href=" {{ route('admin.final-report.index')}}">
                <i class="bi bi-file-earmark-pdf"></i>
                <span>Laporan Mahasiswa</span>
            </a>
        </li><!-- End Pengguna Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/grade')) ? '' : 'collapsed' }}" href="{{ route('admin.grade')}}">
                <i class="bi bi-clipboard2-plus"></i>
                <span>Nilai</span>
            </a>
        </li><!-- End Pengaturan Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/report*')) ? '' : 'collapsed' }}" data-bs-target="#charts-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.report.adviser')}}">
                        <i class="bi bi-circle"></i><span>Dosen Pembimbing</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.report.examine')}}">
                        <i class="bi bi-circle"></i><span>Dosen Penguji</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard/settings')) ? '' : 'collapsed' }}" href="{{ route('admin.settings')}}">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Pengaturan Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Keluar</span>
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="post" style="display:none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </li><!-- End Login Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->


    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @stack('prepend-script')

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    
    
    <script>

        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            // untuk Label | Tp di bootstrap 5 tdk d gunakan
            // sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
        
        function thisFileUpload() {
            document.getElementById("file").click();
        }
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
    </script>
    @stack('addon-script')


</body>

</html>