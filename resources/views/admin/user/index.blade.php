@extends('layouts.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pengguna</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
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
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Pengguna <span>| {{ $usersCount }}</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Foto</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Email</th>
                      <th scope="col">phone_number</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                    <tr>
                      <th scope="row">
                        @if ($user->avatar)
                            <img src="{{$user->avatar}}" class="rounded-circle" alt="" srcset="">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{$user->name}}" class=" rounded-circle" alt="" srcset="">
                        @endif
                      </th>
                      <td class="fw-bold">{{ $user->name }}</td>
                      <td><a href="#" class="text-primary fw-bold">{{ $user->nim}}</a></td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone_number }}</td>
                      <td><a href="{{ route('admin.users.show', $user->id)}}" class="btn btn-info"><i class="bi bi-info-circle"></i></a></td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6">Belum Ada penggua terdaftar</td>
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

