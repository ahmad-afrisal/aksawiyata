@extends('layouts.app-dashboard')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Kegiatan Aktif</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        @include('components.alert')

                        @forelse ($checkouts as $checkout)
                            <!-- Sales Card -->
                            <div class="col-xxl-12 col-md-12">
                                <div class="card info-card sales-card">
                                    <div class="card-body mt-4">
                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-cart"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$checkout->Job->Company->name}}</h6>
                                                <span class="text-success small pt-1 fw-bold">{{$checkout->Job->name}}</span>
                                                <br>
                                                <a href="{{ route('details', $checkout->Job->slug) }}" class="text-muted small pt-2">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->

                            @if (now() > '2023-05-04 01:58:57')
                                <div class="col-12">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">LogBook Hariaan | {{ now() }}</h5>

                                            <!-- Floating Labels Form -->
                                                <form class="row g-3" action="{{ route('admin.job.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                    
                                                    <div class="col-12">
                                                        <label for="name" class="form-label">Kegiatan</label>
                                                        <input type="text" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{old('name') ?: ''}}"  id="name" name="name">
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback">
                                                            {{$errors->first('name')}}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="develop_competencies" class="form-label">Deskripsi Kegiatan</label>
                                                        <textarea class="form-control {{$errors->has('develop_competencies') ? 'is-invalid' : ''}}"  id="editor2" name="develop_competencies" rows="5">{{ old('develop_competencies') ?: ''}}</textarea>
                                                        @if ($errors->has('develop_competencies'))
                                                            <div class="invalid-feedback">
                                                            {{$errors->first('develop_competencies')}}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-2">
                                                        <img src="{{ asset('/storage/') }}" alt="" srcset="" class="img-fluid img-preview">
                                                        
                                                    </div>
                                                    <div class="col-10">
                                                        <label for="photo" class="form-label">Foto Dokumentasi</label>
                                                        <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" onchange="previewImg()" id="sampul" value="" id="photo" name="photo">
                                                        <span class="text-muted small pt-2">Maksimal ukuran gambar </span><span class="text-success small pt-1 fw-bold">1MB</span>
                                                        @if ($errors->has('photo'))
                                                        <div class="invalid-feedback">
                                                            {{$errors->first('photo')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                
                                                    <div class="col-12">
                                                        <div class="d-grid gap-2 mt-3">
                                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                                        </div>                  
                                                    </div>
                                                </form>
                                                <!-- End floating Labels Form -->
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="col-12">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Akhir |  
                                        @if ($item->status)
                                            <span class="badge bg-warning text-dark">Sedang Diperiksa</span>
                                        @else
                                            <span class="badge bg-info text-dark">Belum Upload</span>
                                        @endif

                                        </h5>
                                        <form class="row g-3" action="{{ route('user.activity.report') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-10">
                                                <input class="form-control" type="file" id="report" name="report" {{$item->status == 'Sedang Diperiksa' and $item->status == 'Diterima' ? 'disabled': ''}} required>
                                                <p class="text-muted small pt-2">Link Download : <a href="{{ Storage::url($item->report ?? '')}}">{{ $report }} </a></p>
                                                <span class="text-muted small pt-2">Dokumen harus sesuai dengan </span><span class="text-success small pt-1 fw-bold">Template</span>, <span class="text-muted small pt-2">diisi sesuai petunjuk dan diunggah dalam format pdf dengan ukuran maksimal 5MB. Di upload sebelum seminar KPI.</span>
                                                @if ($errors->has('report'))
                                                <div class="invalid-feedback">
                                                    {{$errors->first('report')}}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->

                            @if ($checkout->status == "selesai")
                                <div class="col-xxl-12 col-md-12">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mt-4">
                                                <div class="">
                                                    <h6>Selamat, kamu telah menyelesaikan program!</h6>
                                                    <span class="text-muted small pt-2">Silahkan unduh sertifikat sebagai bukti keikutsertaan KPI</span>
                                                    <div class="mt-2">
                                                        <button type="button" class="btn btn-primary"><i class="bi bi-download me-1"></i> Unduh Sertifikat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-md-12">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ulasan</h5>
                                            <form action="{{ route('user.activity.review', $checkout->Job->id)}}" method="post">
                                                @csrf
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control {{$errors->has('review') ? 'is-invalid' : ''}}"  value="{{old('review') ?: ''}}" name="review" id="floatingTextarea" style="height: 100px;"></textarea>
                                                    <label for="floatingTextarea">Berikan Ulasan terbaikmu</label>
                                                    @if ($errors->has('review'))
                                                        <div class="invalid-feedback">
                                                            {{$errors->first('review')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-secondary">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- End Sales Card -->
                            @endif
                        
                        @empty
                            <h3>Belum ada kegiatan yang di ikuti</h3>
                        @endforelse
                        

                        
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

@endsection
