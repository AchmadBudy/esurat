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
        <a class="btn btn-primary btn-rounded mb-2" href="/surat-masuk/tambah">Tambah Data</a>

        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ $title }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="no-content">#</th>
                                <th>Kode Klasifikasi</th>
                                <th>Kode Arsip</th>
                                <th>Nomor Registrasi</th>
                                <th>Nomor Surat</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>Isi Ringkasan</th>
                                <th>Tanggal Surat</th>
                                <th>File Surat</th>
                                @if (Auth::user()->is_admin)
                                    <th>Pembuat</th>
                                @endif
                                <th class="no-content">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $surat) 
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $surat->kodeKlasifikasi }}</td>
                                <td>{{ $surat->kodeArsip }}</td>
                                <td>{{ $surat->nomorRegistrasi }}</td>
                                <td>{{ $surat->nomorSurat }}</td>
                                <td>{{ $surat->asalSurat }}</td>
                                <td>{{ $surat->perihal }}</td>
                                <td>{{ $surat->isiRingkas }}</td>
                                <td>{{ date('Y-m-d',strtotime($surat->tanggalSurat)) }}</td>
                                <td>
                                    <a href="{{ asset($surat->fileSurat) }}" target="_blank" rel="noopener noreferrer">Lihat File</a>
                                </td>
                                @if (Auth::user()->is_admin)
                                    <td>{{ $surat->user->name }}</td>
                                @endif
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li>
 
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" type="submit" class="btn btn-primary" href="/surat-masuk/edit/{{ $surat->id }}">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M495.6 49.23l-32.82-32.82C451.8 5.471 437.5 0 423.1 0c-14.33 0-28.66 5.469-39.6 16.41L167.5 232.5C159.1 240 154.8 249.5 152.4 259.8L128.3 367.2C126.5 376.1 133.4 384 141.1 384c.916 0 1.852-.0918 2.797-.2813c0 0 74.03-15.71 107.4-23.56c10.1-2.377 19.13-7.459 26.46-14.79l217-217C517.5 106.5 517.4 71.1 495.6 49.23zM461.7 94.4L244.7 311.4C243.6 312.5 242.5 313.1 241.2 313.4c-13.7 3.227-34.65 7.857-54.3 12.14l12.41-55.2C199.6 268.9 200.3 267.5 201.4 266.5l216.1-216.1C419.4 48.41 421.6 48 423.1 48s3.715 .4062 5.65 2.342l32.82 32.83C464.8 86.34 464.8 91.27 461.7 94.4zM424 288c-13.25 0-24 10.75-24 24v128c0 13.23-10.78 24-24 24h-304c-13.22 0-24-10.77-24-24v-304c0-13.23 10.78-24 24-24h144c13.25 0 24-10.75 24-24S229.3 64 216 64L71.1 63.99C32.31 63.99 0 96.29 0 135.1v304C0 479.7 32.31 512 71.1 512h303.1c39.69 0 71.1-32.3 71.1-72L448 312C448 298.8 437.3 288 424 288z"></path></svg>
                                                </a>

                                        </li>
                                        <li>
                                            <form action="/surat-masuk/hapus" method="POST" onsubmit="return confirm('apakah yakin hapus surat?');">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $surat->id }}">
                                                
                                                <button class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="no-content">#</th>
                                <th>Kode Klasifikasi</th>
                                <th>Kode Arsip</th>
                                <th>Nomor Registrasi</th>
                                <th>Nomor Surat</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>Isi Ringkasan</th>
                                <th>Tanggal Surat</th>
                                <th>File Surat</th>
                                @if (Auth::user()->is_admin)
                                    <th>Pembuat</th>
                                @endif
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