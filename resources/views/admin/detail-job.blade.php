@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          @include('components.alert')
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Pendaftar <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Perusahaan</th>
                      <th scope="col">Sisa Kuota</th>
                      <th scope="col">Tanggal Daftar</th>
                      <th scope="col">Transkip</th>
                      <th scope="col">CV</th>
                      <th scope="col">Status</th>
                      <th scope="col">Setujui</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($checkouts as $checkout)
                      <tr>
                        <th scope="row"><a href="#">{{$checkout->User->nim}}</a></th>
                        <td>{{$checkout->User->name }}</td>
                        <td>{{$checkout->Job->name }}</td>
                        <td>{{$checkout->Job->Company->name }}</td>
                        <td>{{$checkout->Job->quota }}</td>
                        <td>{{ $checkout->created_at->format('M d Y') }}</td>
                        <td><a href="{{$checkout->User->transkip}}" class="text-primary">Lihat</a></td>
                        <td><a href="{{$checkout->User->cv}}" class="text-primary">Lihat CV</a></td>
                        <td>
                          @if ($checkout->status == "sudah daftar")
                            <span class="badge bg-info">Sudah Daftar</span>
                          @elseif ($checkout->status == "ditolak")
                            <span class="badge bg-danger">Di Tolak</span>
                          @elseif ($checkout->status == "terima tawaran")
                            <span class="badge bg-warning">Terima Tawaran</span>
                          @elseif ($checkout->status == "sedang berjalan")
                            <span class="badge bg-success">Sedang Berjalan</span>
                          @else
                            <span class="badge bg-light">Selesai</span>
                          @endif
                        </td>
                        <td>
                          {{-- <form action="" method="post">
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-exclamation-octagon"></i></button>
                          </form> --}}
                          @if ($checkout->status == "sudah daftar" && $checkout->Job->quota > 0 )
                            <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i></button>
                            </form>
                          @endif
                          
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="9">Belum ada pendaftar</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->


        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->


  {{-- | Ditolak | Terima Tawaran | Sedang Berjalan | Selesai --}}

@endsection

