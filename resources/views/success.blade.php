@extends('layouts.app')

@section('content')

<div class="success-main-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content">
          <div class="blur-bg"></div>
          <h4>Yeahhhh</h4>
          <div class="line-dec"></div>
          <h2>Pendaftaran Berhasil</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
          <div class="main-button">
            <a href="{{ route('dashboard') }}">Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection