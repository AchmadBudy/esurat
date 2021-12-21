@extends('layouts.main')

@section('css')
<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin-crock/assets/css/forms/theme-checkbox-radio.css') }}">
<link href="{{ asset('admin-crock/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('admin-crock/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('admin-crock/plugins/sweetalerts/promise-polyfill.js') }}"></script>
<link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('admin-crock/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-crock/plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-crock/plugins/noUiSlider/custom-nouiSlider.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-crock/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>

<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/noUiSlider/nouislider.min.js') }}"></script>

<script src="{{ asset('admin-crock/plugins/flatpickr/custom-flatpickr.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/noUiSlider/custom-nouiSlider.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>

<script>
    @if( session()->has('success'))
        swal({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        type: 'success',
        padding: '2em'
        })
    @endif
    var f1 = flatpickr(document.getElementById('basicFlatpickr')),{
        defaultDate :{{ date('Y-m-d',strtotime($surat->tanggalSurat)) }}
    };
</script>
@endsection

@section('content')

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Ubah Surat Masuk</h4>
                    </div>                                                                        
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/surat-masuk/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $surat->id }}">
                    <input type="hidden" name="namaFile" value="{{ $surat->fileSurat }}">
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="kodeKlasifikasi">Kode Klasifikasi</label>
                            <input type="text" class="form-control" id="kodeKlasifikasi" placeholder="Kode Klasifikasi" name="kodeKlasifikasi" value="{{ $surat->kodeKlasifikasi }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kodeArsip">Kode Arsip</label>
                            <input type="text" class="form-control" id="kodeArsip" placeholder="Kode Arsip" name="kodeArsip" value="{{ $surat->kodeArsip }}">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="nomorRegistrasi">Nomor Registrasi</label>
                            <input type="text" class="form-control" id="nomorRegistrasi" placeholder="Nomor Registrasi" name="nomorRegistrasi" value="{{ $surat->nomorRegistrasi }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomorSurat">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomorSurat" placeholder="Nomor Surat" name="nomorSurat" value="{{$surat->nomorSurat }}">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="asalSurat">Asal Surat</label>
                            <input type="text" class="form-control" id="asalSurat" placeholder="Nomor Registrasi" name="asalSurat" value="{{ $surat->asalSurat }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="{{ $surat->perihal }}">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="basicFlatpickr">Tanggal Surat</label>
                            <input id="basicFlatpickr" class="form-control flatpickr flatpickr-input active" type="date" placeholder="{{ date('Y-m-d',strtotime($surat->tanggalSurat)) }}" name="tanggalSurat" value="{{ date('Y-m-d',strtotime($surat->tanggalSurat)) }}">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="fileSurat">File Surat</label>
                            <input type="file" class="form-control-file" id="fileSurat" name="fileSurat" value="{{ old('fileSurat') }}">
                        </div>
                    </div>

                    <a class="btn btn-primary mb-3" target="_blank" href="{{ asset($surat->fileSurat) }}">Lihat File Surat</a>
                    <div class="form-group mb-4">
                        <label for="isiRingkas">Isi Ringkasan</label>
                        <textarea class="form-control" id="isiRingkas" name="isiRingkas" rows="3"> {{ $surat->isiRingkas }}</textarea>
                    </div>
                  <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>

    </div>



@endsection