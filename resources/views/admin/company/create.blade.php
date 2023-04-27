@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
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
                    <textarea class="form-control"  id="floatingTextarea" style="height: 100px;"></textarea>
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
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Upload Logo</label>
                    <input type="file" class="form-control" id="inputNanme4">
                    <span class="text-muted small pt-2">Maksimal ukuran gambar </span><span class="text-success small pt-1 fw-bold">1MB</span>
                    
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Upload Foto Perusahaan</label>
                    <input type="file" class="form-control" id="inputNanme4">
                    <span class="text-muted small pt-2">Dapat upload beberapa gambar sekaligus.</span>
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

