@extends('layouts.lecture')

@section('content')
<main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Penilaian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Penguji</li>
                <li class="breadcrumb-item active">Form Penilaian</li>
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
                                <h5 class="card-title">Berita Acara Seminar Kerja Praktek</h5>
                
                                <!-- Floating Labels Form -->
                                <form class="row g-3" id="formD" action="{{ route('lecture.examiner.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @forelse ($data as $item)
                                    <div class=" col-12">
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>
                                                <input type="hidden" class="form-control " value="{{ $item->user->id }}" name="user_id"  required>
                                                    {{ $item->user->Student->nama_mhs }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>:</td>
                                                <td>{{ $item->user->Student->nim_mhs }}</td>
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
                                        <label for="exercise_score" class="form-label">Nilai Pelaksanaan KPI</label>
                                        <input type="number" class="form-control {{$errors->has('exercise_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($examiner_score->exercise_score) ?  $examiner_score->exercise_score : ''  }}" id="exercise_score" name="exercise_score"  required>
                                        @if ($errors->has('exercise_score'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('exercise_score')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <label for="report_score" class="form-label">Nilai Laporan</label>
                                        <input type="number" class="form-control {{$errors->has('report_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($examiner_score->report_score)  ? $examiner_score->report_score : ''}}" id="report_score" name="report_score"  required>
                                        @if ($errors->has('report_score'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('report_score')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <label for="presentation_score" class="form-label">Nilai Presentasi</label>
                                        <input type="number" class="form-control {{$errors->has('presentation_score') ? 'is-invalid' : ''}}" onchange="updateFinalScore()" value="{{ isset($examiner_score->presentation_score) ?  $examiner_score->presentation_score : ''}}" id="presentation_score" name="presentation_score"  required>
                                        @if ($errors->has('report_score'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('report_score')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div id="info"></div>
                                        <label for="final_score" class="form-label">Nilai Akhir</label>
                                        <input type="hidden" class="form-control " value="{{ isset($examiner_score->final_score) ? $examiner_score->final_score : ''}}" id="final_score" name="final_score"  required>
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
            var exercise_score = document.getElementById('exercise_score').value;
            var report_score = document.getElementById('report_score').value;
            var presentation_score = document.getElementById('presentation_score').value;
            if (exercise_score == "") {
                exercise_score = 0;
            } 
            if (report_score == "") {
                report_score = 0;
            }  
            if (presentation_score == "") {
                presentation_score = 0;
            } 

            var total= (parseInt(exercise_score) + parseInt(report_score) + parseInt(presentation_score)) / 3;

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

