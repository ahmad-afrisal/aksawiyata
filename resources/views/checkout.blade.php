<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel Reservation Page</title>

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
                        <li><a href="about.html">About</a></li>
                        <li><a href="deals.html">Deals</a></li>
                        <li><a href="reservation.html" class="active">Reservation</a></li>
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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-6">
          <div class="info-item">
            <div class="reservation-form">
              <form id="reservation-form" name="gs" method="submit" role="search" action="{{ url('success')}}">
                <div class="row">
                  <div class="col-lg-12">
                      <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
                  </div>
                  <div class="col-lg-6">
                    <div class="col-lg-12">
                      <fieldset>
                          <label for="Name" class="form-label">Nama Lengkap</label>
                          <input type="text" name="Name" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="Number" class="form-label">NIM</label>
                            <input type="text" name="Number" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="chooseGuests" class="form-label">Konsentrasi</label>
                            <select name="Guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                                <option selected>ex. 3 or 4 or 5</option>
                                <option type="checkbox" name="option1" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4+">4+</option>
                            </select>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="{{ asset('frontend/assets/images/logo/logo-bankid.png') }}" style="max-width:200px" alt="" srcset="">
                    <h5>Full Stack Web Dev</h5>
                    <p>PT Bangk.id</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, nemo quas natus aut nobis id nisi tempore illum laudantium voluptate repellendus sunt atque fuga temporibus. Recusandae perferendis temporibus reiciendis libero reprehenderit aperiam dolorum, provident iure officiis accusantium non doloremque sed voluptates corrupti</p>
                  </div>
                  <div class="col-lg-12 mt-2">                        
                    <fieldset>
                      <button href="{{ url('success')}}" class="main-button">Daftar</button>
                    </fieldset>
                  </div>
                </div>
              </form>
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
  </script>

  </body>

</html>
