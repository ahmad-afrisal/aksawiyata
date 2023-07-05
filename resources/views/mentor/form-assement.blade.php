@extends('layouts.mentor')

@section('content')
<main id="main" class="main">

        <div class="pagetitle">
            <h1>Perusahaan</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Perusahaan</li>
                <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Penilaian Pelaksana Kerja Praktek</h5>
            
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('mentor.assesment.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @forelse ($data as $item)
                                    <div class=" col-12">
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="hidden" class="form-control " value="{{ $item->user->id }}" name="user_id"  required>
                                                    {{ $item->user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>:</td>
                                                <td>{{ $item->user->nim }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Kerja Praktek Industri</td>
                                                <td>:</td>
                                                <td>{{ $item->Job->Company->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Kerja Praktik Industri</td>
                                                <td>:</td>
                                                <td>{{ $item->updated_at->format('M d Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Topik Kerja Praktik Industri</td>
                                                <td>:</td>
                                                <td>{{ $item->Job->name }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                @empty
                                    <p>Data Tidak ditemukan</p>
                                @endforelse

                                
                                <div class="col-lg-3 col-12">
                                    <label for="attitude_score" class="form-label">Sikap</label>
                                    <input type="number" class="form-control {{$errors->has('attitude_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($mentor_score->attitude_score) ?  $mentor_score->attitude_score : ''  }}" id="attitude_score" name="attitude_score"  required>
                                    @if ($errors->has('attitude_score'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('attitude_score')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-12">
                                    <label for="diligent_score" class="form-label">Kerajinan</label>
                                    <input type="number" class="form-control {{$errors->has('diligent_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($mentor_score->diligent_score) ?  $mentor_score->diligent_score : ''  }}" id="diligent_score" name="diligent_score"  required>
                                    @if ($errors->has('diligent_score'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('diligent_score')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-12">
                                    <label for="performance_score" class="form-label">Prestatsi</label>
                                    <input type="number" class="form-control {{$errors->has('performance_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($mentor_score->performance_score) ?  $mentor_score->performance_score : ''  }}" id="performance_score" name="performance_score"  required>
                                    @if ($errors->has('performance_score'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('performance_score')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-12">
                                    <label for="final_score" class="form-label">Nilai Akhir</label>
                                    <input type="hidden" class="form-control " value="{{ isset($mentor_score->final_score) ? $mentor_score->final_score : ''}}" id="final_score" name="final_score">
                                    <input type="text" class="form-control {{$errors->has('final_score') ? 'is-invalid' : ''}}" value="{{ $text_score ?: ''}}" id="text_score" >
                                    @if ($errors->has('final_score'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('final_score')}}
                                    </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </form><!-- End floating Labels Form -->
            
                        </div>
                        </div>
            
                    </div>
                </div><!-- End Left side columns -->
        
            </div>
        </section>
    

</main><!-- End #main -->


@endsection

@push('addon-script')

    <script>

        function updateFinalScore() {
            // Mendapatkan nilai input dari elemen input lain
            var attitude_score = document.getElementById('attitude_score').value;
            var diligent_score = document.getElementById('diligent_score').value;
            var performance_score = document.getElementById('performance_score').value;
            if (attitude_score == "") {
                attitude_score = 0;
            } 
            if (diligent_score == "") {
                diligent_score = 0;
            }  
            if (performance_score == "") {
                performance_score = 0;
            } 

            var total= (parseInt(attitude_score) + parseInt(diligent_score) + parseInt(performance_score)) / 3;

            var total_score = total.toFixed(2);

            var f_score = "E";
            if (total_score >= 85) {
                f_score = "A";
            }  else if (total_score >= 80) {
                f_score = "A-";
            } else if (total_score >= 75) {
                f_score = "B+";
            } else if (total_score >= 70) {
                f_score = "B";
            } else if (total_score >= 65) {
                f_score = "B-";
            } else if (total_score >= 50) {
                f_score = "C";
            } else if (total_score >= 40) {
                f_score = "D";
            } else if (total_score < 40){
                f_score = "E";
            }


            // Menetapkan nilai input dari elemen input lain ke input teks
            document.getElementById('text_score').value = f_score;
            document.getElementById('final_score').value = total_score;
        }


    </script>
    
@endpush