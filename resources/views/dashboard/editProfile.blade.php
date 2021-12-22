@extends('layouts.main')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-crock/plugins/dropify/dropify.min.css') }}">
<link href="{{ asset('admin-crock/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin-crock/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin-crock/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-crock/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('admin-crock/plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/blockui/jquery.blockUI.min.js') }}"></script>
<!-- <script src="plugins/tagInput/tags-input.js"></script> -->
<script src="{{ asset('admin-crock/assets/js/users/account-settings.js') }}"></script>

<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin-crock/plugins/sweetalerts/custom-sweetalert.js') }}"></script>


<script>
    @if( session()->has('success'))
        swal({
        title: 'Ubah Profile Berhasil!',
        text: "{{ session('success') }}",
        type: 'success',
        padding: '2em'
        })
    @endif
</script>
@endsection



@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
    <form id="general-info" class="section general-info" method="POST" action="/profile/edit" enctype="multipart/form-data">
        @csrf
        <div class="info">
            <h6 class="">Edit Profile</h6>
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row">
                        <div class="col-xl-2 col-lg-12 col-md-4">
                            <div class="upload mt-4 pr-md-4">
                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('images-profile/'.Auth::user()->gambar) }}" data-max-file-size="2M" name="gambar" accept="image/*"/>
                                <input type="hidden" name="gambarLama" value="{{ Auth::user()->gambar }}">

                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                @error('gambar')
                                    <div class="invalid-feedback d-block">
                                        ada yang salah nih coba upload yang lain!!
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                            <div class="form">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control mb-4" id="name" placeholder="Full Name" value="{{ Auth::user()->name }}" name="name" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            Jangan Kosong!!
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="NIP">NIP</label>
                                            <input type="text" class="form-control mb-4" id="NIP" placeholder="NIP" value="{{ Auth::user()->NIP }}" name="NIP">
                                            @error('NIP')
                                                <div class="invalid-feedback  d-block">
                                                    Jangan Kosong!!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="no_telp">Nomor Telepon</label>
                                            <input type="text" class="form-control mb-4" id="no_telp" placeholder="no_telp" value="{{ Auth::user()->no_telp }}" name="no_telp">
                                            @error('no_telp')
                                                <div class="invalid-feedback  d-block">
                                                    Jangan Kosong!!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mb-4" id="email" placeholder="email" value="{{ Auth::user()->email }}" name="email">
                                    @error('email')
                                        <div class="invalid-feedback  d-block">
                                            Jangan Kosong/Silahkan pilih email lain!!
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary mb-2 mr-5" type="submit">Save</button>
                                    <a class="btn btn-outline-primary mb-2" href="/profile">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection