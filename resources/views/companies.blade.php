@extends('layouts.app')

@section('content')
<div class="more-about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="left-image">
          <img src="{{ Storage::url($company->CompanyGallery->first()->photos ?? '')}}" style="border-radius: 5px; max-height: 550px" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-lg-6">
          <div class="main-button">
              <img src="{{ Storage::url($company->logo ?? '')}}" style="max-width:100px" alt="" srcset="">
          </div>
          <div class="section-heading">
              <h2>{{ $company->name }}</h2>
              <p>{!! $company->about !!}</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>{{ $company->number_of_employees}}</h4>
                  <span>Jumlah Karwayan</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                  <h4>{{ $company->ceo }}</h4>
                  <span>Pimpinan Perusahaan</span>
              </div>
            </div>      
            <div class="col-lg-12">
              <div class="info-item">
                  <h4>{{ $company->website_link }}</h4>
                  <span>Website</span>
              </div>
            </div>      
            <div class="col-lg-12">
              <div class="info-item">
                  <h4>{{ $company->street }}, Kec. {{ $company->district }} Kab. {{ $company->regency }} Provinsi {{ $company->province }}, {{ $company->postal_code }}</h4>
                  <span>Alamat</span>
              </div>
            </div>
          </div>          
      </div>
    </div>
  </div>
</div>


@endsection