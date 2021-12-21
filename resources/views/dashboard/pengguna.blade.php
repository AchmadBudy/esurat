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

<link rel="stylesheet" type="text/css" href="{{ asset('admin-crock/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-crock/plugins/table/datatable/dt-global_style.css') }}">
@endsection

@section('js')
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>

<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-crock/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

<script src="{{ asset('admin-crock/plugins/table/datatable/datatables.js') }}"></script>

<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7 
    });
</script>

<script>
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
            <button class="btn btn-primary btn-rounded mb-2" data-toggle="modal" data-target="#exampleModal">Tambah Pengguna</button>

            {{-- start modal tambah pengguna --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="/pengguna/tambah" method="POST">
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="NIP">NIP</label>
                                        <input type="number" class="form-control" id="NIP" placeholder="NIP" name="NIP">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input type="number" class="form-control" id="no_telp" placeholder="08xx" name="no_telp">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputState">Jabatan</label>
                                        <select id="inputState" class="form-control" name="jabatan_id">
                                            @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                                
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check pl-0">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="gridCheck" name="is_admin" value="1">
                                            <label class="custom-control-label" for="gridCheck">Apakah admin?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- end modal tambah pengguna --}}

            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>List Pengguna</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="no-content">#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>NIP</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Admin</th>
                                    <th class="no-content">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penggunas as $pengguna) 
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{ $pengguna->name }}</td>
                                    <td>{{ $pengguna->jabatan->nama_jabatan }}</td>
                                    <td>{{ $pengguna->NIP }}</td>
                                    <td>{{ $pengguna->no_telp }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>
                                        @if ($pengguna->is_admin)
                                        <p class="text-primary">YES</p>
                                        
                                        @else
                                        <p class="text-danger">NO</p>
                                        
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($pengguna->id != Auth::user()->id)
                                        <ul class="table-controls">
                                            <li>
                                                <form action="/pengguna/reset" method="POST" onsubmit="return confirm('apakah yakin reset password?');">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $pengguna->id }}">
                                                    <button data-toggle="tooltip" data-placement="top" title="Reset Password" type="submit" class="btn btn-primary">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-rotate-left" class="svg-inline--fa fa-arrow-rotate-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M480 256c0 123.4-100.5 223.9-223.9 223.9c-48.86 0-95.19-15.58-134.2-44.86c-14.14-10.59-17-30.66-6.391-44.81c10.61-14.09 30.69-16.97 44.8-6.375c27.84 20.91 61 31.94 95.89 31.94C344.3 415.8 416 344.1 416 256s-71.67-159.8-159.8-159.8C205.9 96.22 158.6 120.3 128.6 160H192c17.67 0 32 14.31 32 32S209.7 224 192 224H48c-17.67 0-32-14.31-32-32V48c0-17.69 14.33-32 32-32s32 14.31 32 32v70.23C122.1 64.58 186.1 32.11 256.1 32.11C379.5 32.11 480 132.6 480 256z"></path></svg>
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="/pengguna/hapus" method="POST" onsubmit="return confirm('apakah yakin hapus pengguna?');">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $pengguna->id }}">
                                                    
                                                    <button class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="no-content">#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>NIP</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Admin</th>
                                    <th class="no-content">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection