@extends('layouts.app')

@section('content')
      <!-- ***** Main Banner Area Start ***** -->

  <!-- ***** Main Banner Area End ***** -->
  {{-- <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-2">
                <h4>Filter :</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Lokasi</option>
                          <option type="checkbox" name="option1" value="Italy">Majene</option>
                          <option value="France">Polewali Mandar</option>
                          <option value="Switzerland">Makassar</option>
                          <option value="Thailand">Jogjakarta</option>
                          <option value="Australia">Bandung</option>
                          <option value="India">Surabaya</option>
                          <option value="Indonesia">Malang</option>
                          <option value="Malaysia">Pekanbaru</option>
                          <option value="Singapore">Jakarta</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Posisi</option>
                          <option value="100">Web Programming</option>
                          <option value="250">Data Analyst</option>
                          <option value="500">UI/UX Designer</option>
                          <option value="1000">Programmer</option>
                          <option value="2500+">Mobile Developer</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button class="border-button">Cari</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  
  <div class="visit-country mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Temukan Karier Impianmu dan Raih Kesuksesan</h2>
            <p>Dengan persiapan yang tepat dan strategi yang efektif, kamu bisa menemukan pekerjaan yang sesuai dengan minat, kemampuan, dan tujuan kariermu. .</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="items">
            <div class="row">
              @forelse ($jobs as $job)
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="{{ Storage::url($job->Company->CompanyGallery->first()->photos ?? '') }}" alt="" style="min-height:250px; max-height: 280px">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>{{ $job->name }}</h4>
                        <span>{{ $job->company->name }}</span>
                        <div class="main-button">
                          <a href="{{ route('details', $job->slug) }}">Lihat</a>
                        </div>
                        <p>{!! $job->company->about !!}</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i>{{ $job->company->number_of_employees }}</li>
                          <li><i class="fa fa-globe"></i>{{ $job->company->website_link }} </li>
                          <li><i class="fa fa-home"></i>{{ $job->company->regency }}</li>
                        </ul>
                        <div class="text-button">
                          <a href="{{ route('companies', $job->company->slug) }}">Selengkapnya <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @empty
                <p>No Data</p>
              @endforelse
              <div class="col-12">
                <div class="text-button">
                  <a href="{{ route('jobs') }}">Posisi Lainnya<i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
