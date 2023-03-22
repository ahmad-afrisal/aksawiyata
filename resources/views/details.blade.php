<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel - About Us</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html" class="active">About</a></li>
                        <li><a href="deals.html">Deals</a></li>
                        <li><a href="reservation.html">Reservation</a></li>
                        <li><a href="reservation.html">Book Yours</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

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

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/vue/vue.js') }}"></script>

  <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/tabs.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/popup.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });

    var gallery = new Vue({
      el: "#gallery",
      mounted() {
        AOS.init();
      },
      data: {
        activePhoto: 0,
        photos: [
          {
            id: 1,
            url: "{{ asset('frontend/assets/images/product-details-1.jpg') }}"
          },
          {
            id: 2,
            url: "{{ asset('frontend/assets/images/product-details-2.jpg') }}"
          },
          {
            id: 3,
            url: "{{ asset('frontend/assets/images/product-details-3.jpg') }}"
          },
          {
            id: 4,
            url: "{{ asset('frontend/assets/images/product-details-4.jpg') }}"
          },
          {
            id: 5,
            url: "{{ asset('frontend/assets/images/product-details-4.jpg') }}"
          },
        ],
      },
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        }
      }
    })
  </script>

  </body>

</html>
