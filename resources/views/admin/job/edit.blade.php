@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Posisi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item ">Posisi</li>
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
                <form class="row g-3" action="{{ route('admin.job.update', $job->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- <input type="hidden" value="{{ $job->id}}"  id="id"> --}}

                  <div class="col-6">
                    <label for="company_id" class="form-label">Perusahaan</label>
                    
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" name="company_id">
                        <option value="{{ $job->companies_id }}">{{ $job->company->name }}</option>
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="col-6">
                    <label for="name" class="form-label">Posisi</label>
                    <input type="text" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{ $job->name}}"  id="name" name="name">
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                        {{$errors->first('name')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="details_of_activities" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control {{$errors->has('details_of_activities') ? 'is-invalid' : ''}}" id="editor1" name="details_of_activities">{{ $job->details_of_activities }}</textarea>
                    @if ($errors->has('details_of_activities'))
                      <div class="invalid-feedback">
                        {{$errors->first('details_of_activities')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="develop_competencies" class="form-label">Kompetensi yang Dikembangkan</label>
                    <textarea class="form-control {{$errors->has('develop_competencies') ? 'is-invalid' : ''}}"  id="editor2" name="develop_competencies">{{ $job->develop_competencies }}</textarea>
                    @if ($errors->has('develop_competencies'))
                      <div class="invalid-feedback">
                        {{$errors->first('develop_competencies')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="participant_criteria" class="form-label">Kriteria Peserta</label>
                    <textarea class="form-control {{$errors->has('participant_criteria') ? 'is-invalid' : ''}}"  id="editor3" name="participant_criteria">{{ $job->participant_criteria }}</textarea>
                    @if ($errors->has('participant_criteria'))
                      <div class="invalid-feedback">
                        {{$errors->first('participant_criteria')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="additional_information" class="form-label">Informasi Tambahan</label>
                    <textarea class="form-control {{$errors->has('additional_information') ? 'is-invalid' : ''}}" id="editor4" name="additional_information">{{ $job->additional_information }}</textarea>
                    @if ($errors->has('additional_information'))
                      <div class="invalid-feedback">
                        {{$errors->first('additional_information')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="quota" class="form-label">Kuota</label>
                    <input type="number" class="form-control {{$errors->has('quota') ? 'is-invalid' : ''}}"  value="{{ $job->quota }}" id="quota" name="quota">
                    @if ($errors->has('quota'))
                      <div class="invalid-feedback">
                        {{$errors->first('quota')}}
                      </div>
                    @endif
                  </div>
                  <div class="col-6">
                    <label for="status"  class="form-label">Status</label>
                    <div class="col-sm-12">
                      <select class="form-select {{$errors->has('status') ? 'is-invalid' : ''}}"  aria-label="Default select example" name="status">
                        <option value="{{ $job->status }}">{{ $job->status ? 'terbuka' : 'tertutup'}}</option>
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

