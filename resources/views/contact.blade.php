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
              <img src="{{ asset('frontend/assets/images/offers-02.jpg') }}" alt="">
              <div class="text">
                <h4>Penanggung Jawab 1<br><span>Esia</span></h4>
                <div class="line-dec"></div>
                <ul>
                  <li>Kontak:</li>
                  <li><i class="fa fa-phone"></i> -</li>
                  <li><i class="fa-brands fa-whatsapp"></i> -</li>
                  <li><i class="fa fa-envelope"></i> -</li>
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
                <h4>Penanggung Jawab 2<br><span><i class="fa fa-users"></i> Ahmad Afrisal</span></h4>
                <div class="line-dec"></div>
                <ul>
                  <li>Kontak:</li>
                  <li><i class="fa fa-phone"></i> -</li>
                  <li><i class="fa-brands fa-whatsapp"></i> -</li>
                  <li><i class="fa fa-envelope"></i> -</li>
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