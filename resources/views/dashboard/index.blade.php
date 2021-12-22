@extends('layouts.main')

@section('css')
    
<link href="{{ asset('admin-crock/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin-crock/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('admin-crock/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
<script src="{{ asset('admin-crock/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin-crock/assets/js/scrollspyNav.js') }}"></script>

<script>

var d_1options1 = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
              show: false,
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 1,
                color: '#515365',
                opacity: 0.3,
            }
        },
        colors: ['#5c1ac3', '#ffbb44'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'  
            },
        },
        dataLabels: {
            enabled: false
        },
        legend: {
              position: 'bottom',
              horizontalAlign: 'center',
              fontSize: '14px',
              markers: {
                width: 10,
                height: 10,
              },
              itemMargin: {
                horizontal: 0,
                vertical: 8
              }
        },
        grid: {
          borderColor: '#191e3a',
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Surat Masuk',
            data: [@foreach($suratMasukTahunan as $data) {{ $data }}, @endforeach]
        }, {
            name: 'Surat Keluar',
            data: [@foreach($suratKeluarTahunan as $data) {{ $data }}, @endforeach]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            type: 'vertical',
            shadeIntensity: 0.3,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100]
          }
        },
        tooltip: {
          theme: 'dark',
            y: {
                formatter: function (val) {
                    return val
                }
            }
        }
      }

var d_1C_3 = new ApexCharts(
document.querySelector("#uniqueVisits"),
d_1options1
  );
  d_1C_3.render();
</script>
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

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-5">
            <div class="widget widget-content-area br-4">
                <div class="widget-two">

                    <div id="uniqueVisits"></div>
                </div>
            </div>
        </div>
    </div>



@endsection