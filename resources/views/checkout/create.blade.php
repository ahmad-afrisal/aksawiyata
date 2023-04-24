@extends('layouts.app')

@section('content')
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
            <form id="reservation-form" name="gs" method="post" role="search" action="{{ route('checkout.store', $job->id)}}">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                    <h4>Konfirmasi <em>Pendaftaran</em></h4>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-12">
                    <fieldset>
                        <label for="nim" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="Name"  autocomplete="on" value="{{Auth::user()->name}}" disabled required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                      <fieldset>
                          <label for="nim" class="form-label">NIM</label>
                          <input type="text" name="nim" class="Number"  autocomplete="on" value="{{Auth::user()->nim}}" disabled maxlength="8" required>
                      </fieldset>
                  </div>

                </div>
                <div class="col-lg-6">
                  <img src="{{ asset('frontend/assets/images/logo/logo-bankid.png') }}" style="max-width:200px" alt="" srcset="">
                  <h5>{{ $job->name }}</h5>
                  <p>{{ $job->company->name }}</p>
                  <p>{{ $job->company->about }}</p>
                </div>
                <div class="col-lg-12 mt-2">                        
                  <fieldset>
                    <button class="main-button">Konfirmasi</button>
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
@endsection
