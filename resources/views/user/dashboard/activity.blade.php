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
                        @if (!$checkout->count)

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

                            <div class="col-12">
                                
                                <div class="card info-card sales-card">
                                    <div class="filter">
                                        <a class=" btn btn-sm btn-secondary" href="{{ route('user.activity.logbook-history')}}">Riwayat Pengisian &nbsp</a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">LogBook Hariaan | {{ now() }}</h5>

                                        <!-- Floating Labels Form -->
                                            <form class="row g-3" action="{{ route('user.activity.logbook') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="activity" class="form-label">Kegiatan</label>
                                                    <input type="text" class="form-control  {{$errors->has('activity') ? 'is-invalid' : ''}}"  value="{{old('activity') ?: ''}}"  id="activity" name="activity">
                                                    @if ($errors->has('activity'))
                                                        <div class="invalid-feedback">
                                                        {{$errors->first('activity')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="detail_activity" class="form-label">Deskripsi Kegiatan</label>
                                                    <textarea class="form-control {{$errors->has('detail_activity') ? 'is-invalid' : ''}}"  id="editor2" name="detail_activity" rows="5">{{ old('detail_activity') ?: ''}}</textarea>
                                                    @if ($errors->has('detail_activity'))
                                                        <div class="invalid-feedback">
                                                        {{$errors->first('detail_activity')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-2">
                                                    <img src="{{ asset('/storage/') }}" alt="" srcset="" class="img-fluid img-preview">
                                                </div>
                                                <div class="col-10">
                                                    <label for="photo" class="form-label">Foto Dokumentasi</label>
                                                    <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" onchange="previewImg()" id="sampul" id="photo" name="photo">
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

                            <div class="col-12">
                                
                                <div class="card info-card sales-card">
                                    <div class="filter">
                                        <a class=" btn btn-sm btn-secondary" href="{{ route('user.activity.consultation-history')}}">Riwayat Bimbingan &nbsp</a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Bimbingan | {{ now() }}</h5>

                                        <!-- Floating Labels Form -->
                                            <form class="row g-3" action="{{ route('user.activity.consultation', $checkout->Job->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="date" class="form-label">Waktu Bimbingan</label>
                                                    <input type="date" class="form-control  {{$errors->has('date') ? 'is-invalid' : ''}}"  value="{{old('date') ?: ''}}"  id="date" name="date" required>
                                                    @if ($errors->has('date'))
                                                        <div class="invalid-feedback">
                                                        {{$errors->first('date')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <label for="topic" class="form-label">Topik Bimbingan</label>
                                                    <input type="text" class="form-control  {{$errors->has('topic') ? 'is-invalid' : ''}}"  value="{{old('topic') ?: ''}}"  id="topic" name="topic" required>
                                                    @if ($errors->has('topic'))
                                                        <div class="invalid-feedback">
                                                        {{$errors->first('topic')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="detail" class="form-label">Detail Bimbingan</label>
                                                    <textarea class="form-control {{$errors->has('detail') ? 'is-invalid' : ''}}"  id="editor2" name="detail" rows="5">{{ old('detail') ?: ''}}</textarea>
                                                    @if ($errors->has('detail'))
                                                        <div class="invalid-feedback">
                                                        {{$errors->first('detail')}}
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

                            <div class="col-12">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Akhir |  
                                        @if ($item->status == "Belum Upload")
                                            <span class="badge bg-info text-dark">Belum Upload</span>
                                        @elseif($item->status == "Sedang Diperiksa")
                                            <span class="badge bg-warning text-dark">Sedang Diperiksa</span>
                                        @elseif($item->status == "Diterima")
                                            <span class="badge bg-success text-white">Diterima</span>
                                        @elseif($item->status == "Ditolak")
                                            <span class="badge bg-danger text-white">Ditolak</span>
                                        @endif

                                        </h5>
                                        <form class="row g-3" action="{{ route('user.activity.report') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-10">
                                                <input class="form-control" type="file" id="report" name="report" {{ $item->status == "Sedang Diperiksa" || $item->status == "Diterima" ? 'disabled': ''}}  required>
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
                            
                            
                        @else
                            <h3>Belum ada kegiatan yang di ikuti</h3>
                        @endif
                        
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

@endsection
