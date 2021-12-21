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
@endsection

@section('js')
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>

<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

<script>
    function edits(id){
        var nama_jabatan = $('#nam'+id).text();
        swal({
            title: 'Edit Jabatan',
            html:
            '<form action="/jabatan/edit" method="post">@csrf<div class="form-group mb-3"><input type="hidden" name="id" value="'+id+'"><input type="text" class="form-control" id="nama_jabatan" placeholder="Nama Jabatan" value="'+nama_jabatan+'" name="nama_jabatan"></div><button type="submit" class="btn btn-primary mt-3" >Edit</button></form>',
            confirmButtonText:'<i class="flaticon-checked-1"></i> Cancel!',
            padding: '2em'
        })
    }
    @if( session()->has('success'))
        swal({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        type: 'success',
        padding: '2em'
        })
    @endif
    


</script>
@endsection

@section('content')

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableProgress" class="col-lg-12 col-12 layout-spacing">
            @error('nama_jabatan')
                <div class="invalid-feedback d-block">
                    Mohon cari yang lain!! atau mohon isi jangan kosong!!
                </div>
            @enderror
            <button class="btn btn-primary btn-rounded mb-2" data-toggle="modal" data-target="#exampleModal">Tambah Jabatan</button>

            {{-- start modal tambah jabatan --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="/jabatan" method="POST">
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah jabatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label for="nama_jabatan">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" placeholder="Nama Jabatan" name="nama_jabatan">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- end modal tambah jabatan --}}

            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Progress Table</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Jabatan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatans as $jabatan) 
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td id="nam{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="javascript:void(0);" onclick="edits({{ $jabatan->id }})" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                            <li>
                                                <form action="/jabatan/hapus" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $jabatan->id }}">
                                                    <button href="javascript:void(0);" type="submit" class="btn btn-danger" onclick="confirm('Yakin ngapus?')" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection