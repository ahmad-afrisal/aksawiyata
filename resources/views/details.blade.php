@extends('layouts.app')

@section('content')
  <!-- ***** Main Banner Area Start ***** -->
  <div class="about-main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->

<div class="cities-town mb-5">
  <div class="container">
    <div class="row">
      <div class="slider-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="container">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-lg-12">
            <section class="store-gallery" id="gallery">
              <div class="container">
                <div class="row">
                  <div class="col-lg-10" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                      <img
                        :key="photos[activePhoto].id"
                        :src="photos[activePhoto].url"
                        class="w-100 main-image"
                        alt=""
                      />
                    </transition>
                  </div>
                  <div class="col-lg-2">
                    <div class="row">
                      <div
                        class="col-3 col-lg-12 mt-2 mt-lg-0"
                        v-for="(photo, index) in photos"
                        :key="photo.id"
                        data-aos="zoom-in"
                        data-aos-delay="100"
                      >
                        <a href="#" @click="changeActive(index)">
                          <img
                            :src="photo.url"
                            class="w-100 thumbnail-image"
                            :class="{ active: index == activePhoto }"
                            alt=""
                          />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <div class="store-details-container" data-aos="fade-up">

              <div class="store-heading">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-10">
                      <h1>{{  $job->name}}</h1>
                      <div class="owner">{{ $job->company->name }}</div>
                      <div class="price" id="price">Kuota {{  $job->quota}} orang</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                      <a
                        class="btn btn-success nav-link py-2 text-white btn-block mb-3"
                        href="{{ route('checkout.create', $job->slug)}}"
                        >Daftar</a
                      >
                    </div>

                  </div>
                </div>
              </div>
              <div class="store-description">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-8">
                      <h5 class="mt-1">Detail Kegiatan</h5>
                      <p>
                        {{  $job->details_of_activities }}
                        
                      </p>
                      <h5 class="mt-3">Kompetensi yang dikembangkan</h5>
                      <p>
                        {{  $job->develop_competencies}}
                        
                      </p>
                      <h5 class="mt-3">Kriteria Peserta</h5>
                      <p>
                        {{  $job->participant_criteria }}
                        
                      </p>
                      <h5 class="mt-3">Informasi Tambahan</h5>
                      <p>
                        {{  $job->additional_information}}
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="store-review">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                      <h5>Student Review (3)</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-8">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="{{ asset('frontend/assets/images/icon-testimonial-1.png') }}" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h5 class="mt-2 mb-1">Hazza Risky</h5>
                          <p>I thought it was not good for living room. I really happy to decided buy this product last week
                            now feels like homey.</p>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="{{ asset('frontend/assets/images/icon-testimonial-2.png') }}" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                          <p>Color is great with the minimalist concept. Even I thought it was made by Cactus industry. I do
                            really satisfied with this.</p>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="{{ asset('frontend/assets/images/icon-testimonial-3.png') }}" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h5 class="mt-2 mb-1">Yunimu Wangi</h5>
                          <p>When I saw at first, it was really awesome to have with. Just let me know if there is another
                            upcoming product like this.</p>
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
  </div>
</div>
@endsection