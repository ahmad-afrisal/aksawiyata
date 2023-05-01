@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
          <li class="breadcrumb-item active">Ubah Data</li>
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
                <h5 class="card-title">Ubah Data</h5>
  
                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('admin.company.update', $company->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="users_id" value="{{ Auth::user()->id}}">
                  <div class="col-6">
                    <label for="name" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{ $company->name}}" id="name" name="name">
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                          {{$errors->first('name')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="ceo" class="form-label">Pimpinan Perusahaan</label>
                    <input type="text" class="form-control {{$errors->has('ceo') ? 'is-invalid' : ''}}"  value="{{ $company->ceo}}" id="ceo" name="ceo">
                    @if ($errors->has('ceo'))
                      <div class="invalid-feedback">
                          {{$errors->first('ceo')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="about" class="form-label">Tentang Perusahaan</label>
                    <textarea class="form-control {{$errors->has('about') ? 'is-invalid' : ''}}"   id="editor1" name="about">{!! $company->about !!}</textarea>
                    @if ($errors->has('about'))
                      <div class="invalid-feedback">
                          {{$errors->first('about')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-2">
                    <label for="number_of_employees" class="form-label">Jumlah Karyawan</label>
                    <input type="number" class="form-control {{$errors->has('number_of_employees') ? 'is-invalid' : ''}}"  value="{{ $company->number_of_employees}}"  id="number_of_employees" name="number_of_employees">
                    @if ($errors->has('number_of_employees'))
                      <div class="invalid-feedback">
                          {{$errors->first('number_of_employees')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-4">
                    <label for="website_link" class="form-label">Website</label>
                    <input type="url" class="form-control {{$errors->has('website_link') ? 'is-invalid' : ''}}" value="{{ $company->website_link}}" id="website_link" name="website_link">
                    @if ($errors->has('website_link'))
                      <div class="invalid-feedback">
                        {{$errors->first('website_link')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="street" class="form-label">Alamat Jalan</label>
                    <input type="text" class="form-control  {{$errors->has('street') ? 'is-invalid' : ''}}" value="{{ $company->street}}" id="street" name="street">
                    @if ($errors->has('street'))
                      <div class="invalid-feedback">
                        {{$errors->first('street')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="district" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control {{$errors->has('district') ? 'is-invalid' : ''}}" value="{{ $company->district}}" id="district" name="district">
                    @if ($errors->has('website_link'))
                      <div class="invalid-feedback">
                        {{$errors->first('website_link')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="regency" class="form-label">Kabupaten</label>
                    <input type="text" class="form-control {{$errors->has('regency') ? 'is-invalid' : ''}}" value="{{ $company->regency}}" id="regency" name="regency">
                    @if ($errors->has('regency'))
                      <div class="invalid-feedback">
                        {{$errors->first('regency')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <div class="col-sm-12">
                      <select class="form-select {{$errors->has('province') ? 'is-invalid' : ''}}" id="province" name="province" aria-label="Default select example">
                        <option value="{{ $company->province}}">{{ $company->province}}</option>
                        <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Bangka Belitung">Bangka Belitung</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Banten">Banten</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Selatan">Papua Selatan</option>
                        <option value="Papua Tengah">Papua Tengah</option>
                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                      </select>
                      @if ($errors->has('province'))
                        <div class="invalid-feedback">
                          {{$errors->first('province')}}
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="postal_code" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control {{$errors->has('postal_code') ? 'is-invalid' : ''}}" value="{{ $company->postal_code}}" name="postal_code" id="postal_code">
                    @if ($errors->has('postal_code'))
                      <div class="invalid-feedback">
                        {{$errors->first('postal_code')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-2">
                    <img src="{{ asset('/storage/'.$company->logo) }}" alt="" srcset="" class="img-fluid img-preview">
                    
                  </div>
                  <div class="col-10">
                    <label for="logo" class="form-label">Upload Logo</label>
                    <input type="file" class="form-control {{$errors->has('logo') ? 'is-invalid' : ''}}" onchange="previewImg()" id="sampul" value="{{$company->logo}}" id="logo" name="logo">
                    <span class="text-muted small pt-2">Maksimal ukuran gambar </span><span class="text-success small pt-1 fw-bold">1MB</span>
                    @if ($errors->has('logo'))
                      <div class="invalid-feedback">
                        {{$errors->first('logo')}}
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

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Preview Gambar</h5>

                <div class="row">
                  @foreach ($company->CompanyGallery as $gallery)
                  <div class="col-md-4 mb-4">
                    <div class="gallery-container position-relative">
                      <img src="{{ Storage::url($gallery->photos ?? '')}}" alt=""  style="border-radius: 10px" srcset="" class="w-100">
                      <a href="{{ route('admin.company.gallery-delete', $gallery->id)}}" class="delete-gallery">
                        <img src="{{ asset('backend/assets/img/icon-delete.svg') }}"
                          class="position-absolute top-0 start-100 translate-middle" alt="" srcset="">
                      </a>
                    </div>
                  </div>
                  @endforeach

                  <div class="col-12">
                    <form action="{{ route('admin.company.gallery-upload')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="companies_id" value="{{ $company->id }}">
                      <input type="file" id="file" name="photo" style="display:none;" onchange="form.submit()">
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-secondary" type="button" onclick="thisFileUpload()">Upload Gambar</button>
                      </div>                  
                    </form>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
        </div><!-- End Left side columns -->
  
      </div>
    </section>
  

</main><!-- End #main -->




@endsection

