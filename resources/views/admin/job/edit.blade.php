@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Posisi</li>
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
                    <label for="inputNanme4" class="form-label">Perusahaan</label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Perusahaan</option>
                        <option value="1">Radio Kampus</option>
                        <option value="2">Triasih</option>
                        <option value="1">Bangk.id</option>
                        <option value="2">Laodinawang</option>

                      </select>
                  </div>
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Posisi</label>
                    <input type="text" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control"  id="editor1" style="height: 100px;"></textarea>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Kompetensi yang Dikembangkan</label>
                    <textarea class="form-control"  id="editor2" style="height: 100px;"></textarea>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Kriteria Peserta</label>
                    <textarea class="form-control"  id="editor3" style="height: 100px;"></textarea>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Informasi Tambahan</label>
                    <textarea class="form-control"  id="editor4" style="height: 100px;"></textarea>
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Kuota</label>
                    <input type="number" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-6">
                    <label for="inputNanme4" class="form-label">Status</label>

                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Status</option>
                        <option value="1">terbuka</option>
                        <option value="2">Tertutup</option>
                      </select>
                  </div>
                  </div>

                  <div class="col-12">
                    <div class="d-grid gap-2 mt-3">
                      <a href="{{ route('admin.job.store')}}" class="btn btn-primary" >Simpan Perubahan</a>
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

