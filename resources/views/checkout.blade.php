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
                    <button href="{{ url('success')}}" class="main-button">Konfirmasi</button>
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
