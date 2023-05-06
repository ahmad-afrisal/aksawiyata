@extends('layouts.app')

@section('content')
      <!-- ***** Main Banner Area Start ***** -->
  <section id="section-1">
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>

      <div class="slider">
        <div id="top-banner-1" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Temukan Magang Impianmu dengan Mudah dan Cepat!</h2>
              <h1>Aksawiyata</h1>
              <div class="border-button"><a href="{{ route('user.login.google')}}">Buat Akun</a></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Pengguna :</span><br>{{ $users }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Lowongan :</span><br>{{ $jobsCount }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>Perusahaan :</span><br>{{ $companies }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="#">Cari Posisi</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  <div class="search-form">
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
  </div>
  
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
        <div class="col-lg-8">
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
              {{-- {{ $jobs->links() }} --}}
              <div class="col-lg-12">
                <ul class="page-numbers">
                  <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                    <h2>Mitra</h2>
                    <img src="{{ asset('frontend/assets/images/logo/logo-bankid.png') }}" alt="" srcset="">
                    <img src="{{ asset('frontend/assets/images/logo/logo-bankid.png') }}" alt="" srcset="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
