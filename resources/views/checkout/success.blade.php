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
          <p>Terima kasih sudah mendaftar! Untuk memastikan bahwa Anda selalu terkini dengan status pendaftaran Anda, kami sarankan Anda memeriksa dashboard Anda secara teratur</p>
          <div class="main-button">
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection