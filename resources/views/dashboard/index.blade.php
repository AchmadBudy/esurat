@extends('layouts.main')

@section('css')
    
<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
@endsection

@section('content')

    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="widget widget-content-area br-4">
            <div class="widget-one">
                <h2 class="text-center">Data Surat</h2>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-3">
                        <div class="card component-card_7" style="background-color: midnightblue">
                            <div class="card-body">
                                <h5 class="card-text">Jumlah Surat Masuk</h5>
                                <h6 class="rating-count">{{ $totalSuratMasuk }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-3">
                        <div class="card component-card_7" style="background-color: rgb(94, 94, 206)">
                            <div class="card-body">
                                <h5 class="card-text">Jumlah Surat Keluar</h5>
                                <h6 class="rating-count">{{ $totalSuratKeluar }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-3">
                        <div class="card component-card_7" style="background-color: #282844">
                            <div class="card-body">
                                <h5 class="card-text">Jumlah User</h5>
                                <h6 class="rating-count">{{ $totalUser }}</h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



@endsection