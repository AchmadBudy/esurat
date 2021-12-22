@extends('layouts.main')

@section('css')
<link href="{{ asset('admin-crock/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('admin-crock/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('admin-crock/plugins/sweetalerts/promise-polyfill.js') }}"></script>
<link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('js')
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>

<script src="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

@if( session()->has('success'))
<script>
        swal({
        title: 'Ubah Password Profile Berhasil!',
        text: "{{ session('success') }}",
        type: 'success',
        padding: '2em'
        })
</script>
@endif
    
@endsection

@section('content')

<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing mx-auto">

    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
                <h3 class="">Profile</h3>
                <a href="/profile/edit" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
            </div>
            <div class="text-center user-info">
                <img src="{{ asset('images-profile/'.Auth::user()->gambar) }}" alt="avatar">
                <p class="">{{ Auth::user()->name }}</p>
            </div>
            <div class="user-info-list">

                <div class="">
                    <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-card" class="svg-inline--fa fa-id-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528 32h-480C21.49 32 0 53.49 0 80V96h576V80C576 53.49 554.5 32 528 32zM0 432C0 458.5 21.49 480 48 480h480c26.51 0 48-21.49 48-48V128H0V432zM368 192h128C504.8 192 512 199.2 512 208S504.8 224 496 224h-128C359.2 224 352 216.8 352 208S359.2 192 368 192zM368 256h128C504.8 256 512 263.2 512 272S504.8 288 496 288h-128C359.2 288 352 280.8 352 272S359.2 256 368 256zM368 320h128c8.836 0 16 7.164 16 16S504.8 352 496 352h-128c-8.836 0-16-7.164-16-16S359.2 320 368 320zM176 192c35.35 0 64 28.66 64 64s-28.65 64-64 64s-64-28.66-64-64S140.7 192 176 192zM112 352h128c26.51 0 48 21.49 48 48c0 8.836-7.164 16-16 16h-192C71.16 416 64 408.8 64 400C64 373.5 85.49 352 112 352z"></path></svg> {{ Auth::user()->name }}
                        </li>
                        <li class="contacts-block__item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="id-card-clip" class="svg-inline--fa fa-id-card-clip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M256 128h64c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H256C238.3 0 224 14.33 224 32v64C224 113.7 238.3 128 256 128zM528 64H384v48C384 138.5 362.5 160 336 160h-96C213.5 160 192 138.5 192 112V64H48C21.49 64 0 85.49 0 112v352C0 490.5 21.49 512 48 512h480c26.51 0 48-21.49 48-48v-352C576 85.49 554.5 64 528 64zM288 224c35.35 0 64 28.66 64 64s-28.65 64-64 64s-64-28.66-64-64S252.7 224 288 224zM384 448H192c-8.836 0-16-7.164-16-16C176 405.5 197.5 384 224 384h128c26.51 0 48 21.49 48 48C400 440.8 392.8 448 384 448z"></path></svg>
                            {{ Auth::user()->NIP }}
                        </li>
                        <li class="contacts-block__item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-check" class="svg-inline--fa fa-money-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M512 64C547.3 64 576 92.65 576 128V384C576 419.3 547.3 448 512 448H64C28.65 448 0 419.3 0 384V128C0 92.65 28.65 64 64 64H512zM112 224C103.2 224 96 231.2 96 240C96 248.8 103.2 256 112 256H272C280.8 256 288 248.8 288 240C288 231.2 280.8 224 272 224H112zM112 352H464C472.8 352 480 344.8 480 336C480 327.2 472.8 320 464 320H112C103.2 320 96 327.2 96 336C96 344.8 103.2 352 112 352zM376 160C362.7 160 352 170.7 352 184V232C352 245.3 362.7 256 376 256H456C469.3 256 480 245.3 480 232V184C480 170.7 469.3 160 456 160H376z"></path></svg>{{ Auth::user()->jabatan->nama_jabatan }}
                        </li>
                        <li class="contacts-block__item">
                            <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ Auth::user()->email }}</a>
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{ Auth::user()->no_telp }}
                        </li>

                        <div class="contacts-block__item">
                            @error('password')
                            <div class="invalid-feedback d-block">
                                Password nya SALAH!!!
                            </div>
                            @enderror
                            @error('password-baru')
                            <div class="invalid-feedback d-block">
                                Harap isi PASSWORD YANG BARU!!
                            </div>
                            @enderror
                            <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModal">
                                Ubah Password
                              </button>


                            {{-- start modal ubah password --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group mb-4">
                                                    <input type="password" class="form-control" id="Password" placeholder="Password Sekarang" name="password">

                                                </div>
                                                <div class="form-group mb-4">
                                                    <input type="password" class="form-control" id="nPassword" placeholder="Password Yang Baru" name="password-baru">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal ubah password --}}
                        </div>  
                    </ul>
                </div>                                    
            </div>
        </div>
    </div>


</div>


@endsection