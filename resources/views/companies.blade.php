@extends('layouts.app')

@section('content')
<div class="more-about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="left-image">
          <img src="{{ asset('frontend/assets/images/company/company-3.jpg') }}" style="border-radius: 5px; max-height: 550px" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-lg-6">
          <div class="main-button">
              <img src="{{ asset('frontend/assets/images/logo/logo-bankid.png') }}" style="max-width:100px" alt="" srcset="">
          </div>
          <div class="section-heading">
              <h2>Bangk.id</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>150.640 +</h4>
                  <span>Total Guests Yearly</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>175.000+</h4>
                  <span>Amazing Accomoditations</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>175.000+</h4>
                  <span>Amazing Accomoditations</span>
              </div>
            </div>          
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>175.000+</h4>
                  <span>Amazing Accomoditations</span>
              </div>
            </div>
          </div>          
      </div>
    </div>
  </div>
</div>


@endsection