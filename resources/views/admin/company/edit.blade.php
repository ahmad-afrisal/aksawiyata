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
                <form class="row g-3">
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Pimpinan Perusahaan</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Tentang Perusahaan</label>
                    <textarea class="form-control"  id="editor1" style="height: 100px;"></textarea>
                  </div>
                  <div class="col-2">
                    <label for="inputNanme4" class="form-label">Jumlah Karyawan</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-4">
                    <label for="inputNanme4" class="form-label">Website</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Alamat Jalan</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-3">
                    <label for="inputNanme4" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-3">
                    <label for="inputNanme4" class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-3">
                    <label for="inputNanme4" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-3">
                    <label for="inputNanme4" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-2">
                    <img src="{{ asset('backend/assets/img/news-1.jpg') }}" alt="" srcset="" class="img-fluid">
                    
                  </div>
                  <div class="col-10">
                    <label for="inputNanme4" class="form-label">Upload Logo</label>
                    <input type="file" class="form-control" id="inputNanme4">
                    <span class="text-muted small pt-2">Maksimal ukuran gambar </span><span class="text-success small pt-1 fw-bold">1MB</span>
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
                  <div class="col-md-4">
                    <div class="gallery-container position-relative">
                      <img src="{{ asset('backend/assets/img/news-1.jpg') }}" alt=""  style="border-radius: 10px" srcset="" class="w-100">
                      <a href="#" class="delete-gallery">
                        <img src="{{ asset('backend/assets/img/icon-delete.svg') }}"
                          class="position-absolute top-0 start-100 translate-middle" alt="" srcset="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="gallery-container position-relative">
                      <img src="{{ asset('backend/assets/img/news-1.jpg') }}" alt=""  style="border-radius: 10px" srcset="" class="w-100">
                      <a href="#" class="delete-gallery">
                        <img src="{{ asset('backend/assets/img/icon-delete.svg') }}"
                          class="position-absolute top-0 start-100 translate-middle" alt="" srcset="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="gallery-container position-relative">
                      <img src="{{ asset('backend/assets/img/news-1.jpg') }}"  style="border-radius: 10px"  alt="" srcset="" class="w-100">
                      <a href="#" class="delete-gallery">
                        <img src="{{ asset('backend/assets/img/icon-delete.svg') }}"
                          class="position-absolute top-0 start-100 translate-middle" alt="" srcset="">
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid gap-2 mt-3">
                      <input type="file" id="file" style="display:none;" multiple>
                      <button class="btn btn-secondary" type="button" onclick="thisFileUpload()">Upload Gambar</button>
                    </div>                  
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

