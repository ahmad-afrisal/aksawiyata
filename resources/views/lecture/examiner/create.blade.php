@extends('layouts.lecture')

@section('content')
<main id="main" class="main">

        <div class="pagetitle">
            <h1>Perusahaan</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Perusahaan</li>
                <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Berita Acara Seminar Kerja Praktek</h5>
            
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @forelse ($data as $item)
                            <div class=" col-12">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td>{{ $item->user->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Kerja Praktek Industri</td>
                                        <td>:</td>
                                        <td>{{ $item->Job->Company->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kerja Praktik Industri</td>
                                        <td>:</td>
                                        <td>{{ $item->updated_at->format('M d Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Topik Kerja Praktik Industri</td>
                                        <td>:</td>
                                        <td>{{ $item->Job->name }}</td>
                                    </tr>
                                </table>
                            </div>
                            @empty
                                <p>Data Tidak ditemukan</p>
                            @endforelse

                            
                            <div class="col-lg-3 col-12">
                                <label for="district" class="form-label">Nilai Pelaksanaan KPI</label>
                                <input type="number" class="form-control {{$errors->has('district') ? 'is-invalid' : ''}}" value="{{old('district') ?: ''}}" id="district" name="district"  required>
                                @if ($errors->has('website_link'))
                                <div class="invalid-feedback">
                                    {{$errors->first('website_link')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-12">
                                <label for="regency" class="form-label">Nilai Laporan</label>
                                <input type="number" class="form-control {{$errors->has('regency') ? 'is-invalid' : ''}}" value="{{old('regency') ?: ''}}" id="regency" name="regency"  required>
                                @if ($errors->has('regency'))
                                <div class="invalid-feedback">
                                    {{$errors->first('regency')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-12">
                                <label for="district" class="form-label">Nilai Presentasi</label>
                                <input type="number" class="form-control {{$errors->has('district') ? 'is-invalid' : ''}}" value="{{old('district') ?: ''}}" id="district" name="district"  required>
                                @if ($errors->has('website_link'))
                                <div class="invalid-feedback">
                                    {{$errors->first('website_link')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-12">
                                <label for="regency" class="form-label">Nilai Akhir</label>
                                <input type="number" class="form-control {{$errors->has('regency') ? 'is-invalid' : ''}}" value="{{old('regency') ?: ''}}" id="regency" name="regency"  required>
                                @if ($errors->has('regency'))
                                <div class="invalid-feedback">
                                    {{$errors->first('regency')}}
                                </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                            </form><!-- End floating Labels Form -->
            
                        </div>
                        </div>
            
                    </div>
                </div><!-- End Left side columns -->
        
            </div>
        </section>
    

</main><!-- End #main -->


@endsection

