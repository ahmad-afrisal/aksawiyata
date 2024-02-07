@extends('layouts.admin')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Nilai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Nilai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
  
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            @include('components.alert')
            
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
  
                <div class="card-body">
                  <h5 class="card-title">Periode KPI</h5>
                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ route('admin.grade') }}" method="get" enctype="multipart/form-data">
                      {{-- @csrf --}}
                      <div class="col-12 col-lg-6">
                        <select class="form-select {{$errors->has('semester') ? 'is-invalid' : ''}}" value="{{old('semester') ?: ''}}"  aria-label="Default select example" name="semester" id="semester" required>
                          <option>Pilih Semester</option>
                          @foreach ($semesters as $semester)
                            <option value="{{ $semester->name }}">{{ $semester->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('semester'))
                          <div class="invalid-feedback">
                            {{$errors->first('semester')}}
                          </div>
                        @endif
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary">Tampilkan</button>
                        </div>                  
                      </div>
                    </form>
                    <!-- End floating Labels Form -->
                </div>
  
              </div>
            </div><!-- End Top Selling -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
  
                <div class="card-body pb-0">
                  <h5 class="card-title">Nilai <span>| </span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Semester</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pemimbing Lapangan</th>
                        <th scope="col">Dosen Pembimbing</th>
                        <th scope="col">Dosen Penguji</th>
                        <th scope="col">Nilai Akhir</th>
                        {{-- <th scope="col">Selesai</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($grades as $grade)
                      <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <th scope="row">{{ $grade->Semester->name }}</th>
                        <td>{{ $grade->user->Student->nim_mhs }}</td>
                        <td>{{ $grade->user->Student->nama_mhs }}</td>
                        <td>{{ $grade->mentor_score }}</td>
                        <td>{{ $grade->adviser_score }}</td>
                        <td>{{ $grade->examiner_score }}</td>
                        @if ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 85)
                          <td>A</td>
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 80)
                          <td>A-</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 75)
                          <td>B+</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 70)
                          <td>B</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 65)
                          <td>B-</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 50)
                          <td>C</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) >= 40)
                          <td>D</td> 
                        @elseif ( (($grade->examiner_score +   $grade->adviser_score  +  $grade->examiner_score ) / 3) < 40)
                          <td>E</td> 
                        @endif
                      
                      </tr>
                      @empty
                          <tr>
                            <td colspan="7">Belum Ada Data</td>
                          </tr>
                      @endforelse

  
                    </tbody>
                  </table>
  
                </div>
  
              </div>
            </div><!-- End Top Selling -->
  
          </div>
        </div><!-- End Left side columns -->
  
      </div>
    </section>
  

</main><!-- End #main -->


  

@endsection

@push('addon-script')
<script>
  const selectElement = document.getElementById('semester');

  // Cek apakah nilai tersimpan di LocalStorage
  const savedValue = localStorage.getItem('selected_gender');
  if (savedValue) {
      // Setel nilai pilihan select sesuai dengan nilai yang tersimpan
      selectElement.value = savedValue;
  }

  // Tambahkan event listener untuk menyimpan nilai ke LocalStorage saat ada perubahan nilai
  selectElement.addEventListener('change', function() {
      const selectedValue = selectElement.value;
      localStorage.setItem('selected_gender', selectedValue);
  });
</script>
@endpush
