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
              <br>
              <h2>Caribbean’s <em>Cities &amp; Towns</em></h2>
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
                      <h1>Sofa Ternyaman</h1>
                      <div class="owner">By Galih Pratama</div>
                      <div class="price" id="price">$1,409</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                      <a
                        class="btn btn-success nav-link py-2 text-white btn-block mb-3"
                        href="{{ url('checkout')}}"
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
                      <p>
                        The Nike Air Max 720 SE goes bigger than ever before with
                        Nike's tallest Air unit yet for unimaginable, all-day comfort.
                        There's super breathable fabrics on the upper, while colours
                        add a modern edge.
                      </p>
                      <p>
                        Bring the past into the future with the Nike Air Max 2090, a
                        bold look inspired by the DNA of the iconic Air Max 90.
                        Brand-new Nike Air cushioning underfoot adds unparalleled
                        comfort while transparent mesh and vibrantly coloured details
                        on the upper are blended with timeless OG features for an
                        edgy, modernised look.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="store-review">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                      <h5>Customer Review (3)</h5>
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
                          <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
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