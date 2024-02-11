@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Jadwal Ujian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Jadwal Ujian</li>
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
                <form class="row g-3" action="{{ route('admin.exam-schedule.store') }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="col-12">
                    <label for="exam_date" class="form-label">Tanggal Ujian</label>
                    <input type="date" class="form-control  {{$errors->has('exam_date') ? 'is-invalid' : ''}}"  value="{{old('exam_date') ?: ''}}"  id="exam_date" name="exam_date">
                    @if ($errors->has('exam_date'))
                      <div class="invalid-feedback">
                        {{$errors->first('exam_date')}}
                      </div>
                    @endif
                  </div>

                  <div class="col-12">
                    <label for="place" class="form-label">Tempat Ujian</label>
                    <input type="text" class="form-control  {{$errors->has('place') ? 'is-invalid' : ''}}"  value="{{old('place') ?: ''}}"  id="place" name="place">
                    @if ($errors->has('place'))
                      <div class="invalid-feedback">
                        {{$errors->first('place')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="status"  class="form-label">Status</label>
                    <div class="col-sm-12">
                      <select class="form-select {{$errors->has('status') ? 'is-invalid' : ''}}"  value="{{old('status') ?: ''}}" aria-label="Default select example" name="status" required>
                        <option disabled>Pilih Status</option>
                        <option value="1">terbuka</option>
                        <option value="0">Tertutup</option>
                      </select>
                      @if ($errors->has('status'))
                        <div class="invalid-feedback">
                          {{$errors->first('status')}}
                        </div>
                      @endif
                    </div>
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
        </div><!-- End Left side columns -->
  
      </div>
    </section>
  

</main><!-- End #main -->


  

@endsection

