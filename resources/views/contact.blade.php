@extends('layouts.app')

@section('content')
<div class="weekly-offers">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading text-center">
          <h2>Hubungi Kami</h2>
          <p>Kirim Pesan, Sampaikan aspirasi anda</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-weekly-offers owl-carousel">
          <div class="item">
            <div class="thumb">
              <img src="{{ asset('frontend/assets/images/offers-01.jpg') }}" alt="">
              <div class="text">
                <h4>Havana<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                <h6>$420<br><span>/person</span></h6>
                <div class="line-dec"></div>
                <ul>
                  <li>Deal Includes:</li>
                  <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                  <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                  <li><i class="fa fa-building"></i> Daily Places Visit</li>
                </ul>
                <div class="main-button">
                  <a href="#">Make a Reservation</a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="thumb">
              <img src="{{ asset('frontend/assets/images/offers-02.jpg') }}" alt="">
              <div class="text">
                <h4>Penanggung Jawab 1<br><span>Esia</span></h4>
                <div class="line-dec"></div>
                <ul>
                  <li>Kontak:</li>
                  <li><i class="fa fa-phone"></i> 5 Days Trip > Hotel Included</li>
                  <li><i class="fa-brands fa-whatsapp"></i> Airplane Bill Included</li>
                  <li><i class="fa fa-envelope"></i> Daily Places Visit</li>
                </ul>
                <div class="main-button">
                  <a href="#">Kirim Pesan</a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="thumb">
              <img src="{{ asset('frontend/assets/images/offers-03.jpg') }}" alt="">
              <div class="text">
                <h4>George Town<br><span><i class="fa fa-users"></i> 234 Check Ins</span></h4>
                <h6>$420<br><span>/person</span></h6>
                <div class="line-dec"></div>
                <ul>
                  <li>Deal Includes:</li>
                  <li><i class="fa fa-taxi"></i> 5 Days Trip > Hotel Included</li>
                  <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                  <li><i class="fa fa-building"></i> Daily Places Visit</li>
                </ul>
                <div class="main-button">
                  <a href="#">Kirim Pesan</a>
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