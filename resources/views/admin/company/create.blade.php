@extends('layouts.admin')

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
                <h5 class="card-title">Tambah Data</h5>
  
                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="col-6">
                    <label for="name" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{old('name') ?: ''}}" id="name" name="name"  required>
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                          {{$errors->first('name')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="ceo" class="form-label">Pimpinan Perusahaan</label>
                    <input type="text" class="form-control {{$errors->has('ceo') ? 'is-invalid' : ''}}"  value="{{old('ceo') ?: ''}}" id="ceo" name="ceo"  required>
                    @if ($errors->has('ceo'))
                      <div class="invalid-feedback">
                          {{$errors->first('ceo')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="about" class="form-label">Tentang Perusahaan</label>
                    <textarea class="form-control {{$errors->has('about') ? 'is-invalid' : ''}}"   id="editor1" name="about"  required>{{old('about') ?: ''}}</textarea>
                    @if ($errors->has('about'))
                      <div class="invalid-feedback">
                          {{$errors->first('about')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-2">
                    <label for="number_of_employees" class="form-label">Jumlah Karyawan</label>
                    <input type="number" class="form-control {{$errors->has('number_of_employees') ? 'is-invalid' : ''}}"  value="{{old('number_of_employees') ?: ''}}"  id="number_of_employees" name="number_of_employees"  required> 
                    @if ($errors->has('number_of_employees'))
                      <div class="invalid-feedback">
                          {{$errors->first('number_of_employees')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-4">
                    <label for="website_link" class="form-label">Website</label>
                    <input type="url" class="form-control {{$errors->has('website_link') ? 'is-invalid' : ''}}" value="{{old('website_link') ?: ''}}" id="website_link" name="website_link"  required>
                    @if ($errors->has('website_link'))
                      <div class="invalid-feedback">
                        {{$errors->first('website_link')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="street" class="form-label">Alamat Jalan</label>
                    <input type="text" class="form-control  {{$errors->has('street') ? 'is-invalid' : ''}}" value="{{old('street') ?: ''}}" id="street" name="street"  required>
                    @if ($errors->has('street'))
                      <div class="invalid-feedback">
                        {{$errors->first('street')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="district" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control {{$errors->has('district') ? 'is-invalid' : ''}}" value="{{old('district') ?: ''}}" id="district" name="district"  required>
                    @if ($errors->has('website_link'))
                      <div class="invalid-feedback">
                        {{$errors->first('website_link')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="regency" class="form-label">Kabupaten</label>
                    <input type="text" class="form-control {{$errors->has('regency') ? 'is-invalid' : ''}}" value="{{old('regency') ?: ''}}" id="regency" name="regency"  required>
                    @if ($errors->has('regency'))
                      <div class="invalid-feedback">
                        {{$errors->first('regency')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <div class="col-sm-12">
                      <select class="form-select {{$errors->has('province') ? 'is-invalid' : ''}}" id="province" name="province" aria-label="Default select example"  required>
                        <option value="" readonly>Pilih Provinsi</option>
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
                    <input type="text" class="form-control {{$errors->has('postal_code') ? 'is-invalid' : ''}}" value="{{old('postal_code') ?: ''}}" name="postal_code" id="postal_code"  required>
                    @if ($errors->has('postal_code'))
                      <div class="invalid-feedback">
                        {{$errors->first('postal_code')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="logo" class="form-label">Upload Logo</label>
                    <input type="file" class="form-control {{$errors->has('logo') ? 'is-invalid' : ''}}" value="{{old('logo') ?: ''}}" id="logo" name="logo" required>
                    <span class="text-muted small pt-2">Maksimal ukuran gambar </span><span class="text-success small pt-1 fw-bold">1MB</span>
                    @if ($errors->has('logo'))
                      <div class="invalid-feedback">
                        {{$errors->first('logo')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="photo" class="form-label">Upload Foto Perusahaan</label>
                    <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" value="{{old('photo') ?: ''}}" name="photo[]" multiple required>
                    <span class="text-muted small pt-2">Dapat upload beberapa gambar sekaligus.</span>
                    @if ($errors->has('photo'))
                      <div class="invalid-feedback">
                        {{$errors->first('photo')}}
                      </div>
                    @endif
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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

