@extends('layouts.app-dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bimbingan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Kegiatan Aktif</li>
            <li class="breadcrumb-item active">Bimbingan</li>
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

                <div class="card-body pb-0">
                    <h5 class="card-title">Riwayat Bimbingan </h5>

                    <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Topik Bimbingan</th>
                        <th scope="col">Detail Bimbingan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($consultations as $consultation)
                        <tr>
                        <th scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td class="fw-bold">{{ $consultation->date }}</td>
                        <td class="fw-bold">{{ $consultation->topic }}</td>
                        <td>{{ $consultation->detail }}</td>
                        <td>
                            @if ($consultation->is_accepted == 3)
                                <span class="badge bg-info text-dark">Menuggu Persetujuan</span>
                            @elseif($consultation->is_accepted == 1)
                                <span class="badge bg-success text-white">Diterima</span>
                            @elseif($consultation->is_accepted == 2)
                                <span class="badge bg-danger text-white">Ditolak</span>
                            @endif
                        </td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="6">Belum Mengisi consultation</td>
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

