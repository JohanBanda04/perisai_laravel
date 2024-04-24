@extends('layouts.admin.tabler')
@section('content')
    <style>
        .gradientwarna1 {
            background-image: linear-gradient(#1aa3ff, #45454f, #275368);
        }

        .gradientwarna2 {
            background-image: linear-gradient(#681923, #45454f, #1c0b39);
        }

        .gradientwarna3 {
            background-image: linear-gradient(#584018, #45454f, #254b40);
        }

        .gradientwarna4 {
            background-image: linear-gradient(#381a09, #45454f, #33482b);
        }


    </style>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="gradientwarna1 card card-sm" style="padding: 30px">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                            <span class="bg-success text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg"
                                   class="icon icon-tabler icon-tabler-fingerprint" width="24"
                                   height="24" viewBox="0 0 24 24" stroke-width="2"
                                   stroke="currentColor" fill="none" stroke-linecap="round"
                                   stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3"/>
                                  <path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6"/>
                                  <path d="M12 11v2a14 14 0 0 0 2.5 8"/>
                                  <path d="M8 15a18 18 0 0 0 1.8 6"/>
                                  <path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95"/>
                              </svg>
                            </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{--{{ $rekappresensi->jmlhadir }}--}}
                                    </div>
                                    <div class="text-secondary">
                                        <span style="color: white">Berita</span>
                                        <span class="bg-success" style="border-radius: 5px;
                                        color: white; padding: 11px">
                                            {{ $dtBerita->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @can('admin')
                    <div class="col-sm-6 col-lg-3">
                        <div class="gradientwarna2 card card-sm" style="padding: 30px">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                            <span class="bg-info text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg"
                                   class="icon icon-tabler icon-tabler-file-text"
                                   width="24" height="24"
                                   viewBox="0 0 24 24" stroke-width="2"
                                   stroke="currentColor" fill="none"
                                   stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                                  <path d="M9 9l1 0"/><path d="M9 13l6 0"/><path d="M9 17l6 0"/>
                              </svg>
                            </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            {{--{{ $rekapizin->jmlizin != null? $rekapizin->jmlizin : 0 }}--}}
                                        </div>
                                        <div class="text-secondary">
                                            {{--ASLIII--}}

                                            <span style="color: white">Users</span>
                                            <span class="bg-info" style=" border-radius: 5px;
                                        color: white; padding: 11px">
                                            {{ $satker->count() }}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                <div class="col-sm-6 col-lg-3">
                    <div class="gradientwarna3 card card-sm" style="padding: 30px">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                            <span class="bg-warning text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-sick"
                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                   fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                                    d="M0 0h24v24H0z"
                                                                                                    fill="none"/><path
                                          d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z"/><path d="M9 10h-.01"/><path
                                          d="M15 10h-.01"/><path d="M8 16l1 -1l1.5 1l1.5 -1l1.5 1l1.5 -1l1 1"/></svg>
                            </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{--{{ $rekapizin->jmlsakit != null ? $rekapizin->jmlsakit : 0 }}--}}
                                    </div>
                                    <div class="text-secondary">

                                        <span style="color: white">Konfig</span>
                                        <span class="bg-warning" style=" border-radius: 5px;
                                        color: white; padding: 11px">
                                            {{ $dtKonfig->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="gradientwarna4 card card-sm" style="padding: 30px">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                            <span class="bg-danger text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-clock-filled" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none"/><path
                                            d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 2.66a1 1 0 0 0 -.993 .883l-.007 .117v5l.009 .131a1 1 0 0 0 .197 .477l.087 .1l3 3l.094 .082a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-2.707 -2.708v-4.585l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                                            stroke-width="0" fill="currentColor"/></svg>
                            </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{--{{ $rekappresensi->jmlterlambat }}--}}
                                    </div>
                                    <div class="text-secondary">

                                        <span style="color: white">Laporan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="row mb-3">
                        <center>Grafik Pemberitaan</center>
                    </div>
                    <form action="/panelsatker/dashboardsatker" method="get" id="frmChart" name="frmChart">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="icon icon-tabler icon-tabler-calendar-event"
                                                             width="24" height="24"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" fill="none"
                                                             stroke-linecap="round" stroke-linejoin="round"><path
                                                                    stroke="none"
                                                                    d="M0 0h24v24H0z"
                                                                    fill="none"/><path
                                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/><path
                                                                    d="M16 3l0 4"/><path d="M8 3l0 4"/><path
                                                                    d="M4 11l16 0"/><path
                                                                    d="M8 15h2v2h-2z"/></svg>
                                                    </span>
                                    <input type="text" value="{{ $tgl_dari_default }}"
                                           class="form-control" name="dari" id="dari"
                                           placeholder="Dari Tanggal">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="icon icon-tabler icon-tabler-calendar-event"
                                                             width="24" height="24"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor" fill="none"
                                                             stroke-linecap="round" stroke-linejoin="round"><path
                                                                    stroke="none"
                                                                    d="M0 0h24v24H0z"
                                                                    fill="none"/><path
                                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/><path
                                                                    d="M16 3l0 4"/><path d="M8 3l0 4"/><path
                                                                    d="M4 11l16 0"/><path
                                                                    d="M8 15h2v2h-2z"/></svg>
                                                    </span>
                                    <input type="text" value="{{ $tgl_sampai_default }}"
                                           class="form-control" name="sampai" id="sampai"
                                           placeholder="Sampai Tanggal">
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <center>
                                <div class="form-group">
                                    <button class="btn btn-primary" style="width: 200px" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-search" width="24"
                                             height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                                            <path d="M21 21l-6 -6"/>
                                        </svg>
                                        Filter
                                    </button>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" id="">
                <div class="col-12">
                    <div class="realisasi-card card">
                        <div class="card-body">
                            <!--grafik data paling awal bar chart zona daerah-->
                            <canvas id="bar_chart_berita_satker" height="175">tes</canvas>
                        </div>
                        <script>

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myscript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        /*TIGA*/
        const realisasi_publikasi_total = <?php echo json_encode($realisasi_publikasi_total); ?>;
        //console.log("realisasi_publikasi_total"+realisasi_publikasi_total);

        const total = <?php echo json_encode($total); ?>;
        console.log("totalnya" + total);
    </script>
    <script>
        /*EMPAT*/
        var zona_satker_list = <?php echo json_encode($zona_satker_list_ii);  ?>;
        //console.log(zona_satker_list);
        var nama_zona_satker = [];
        var persen_realisasi = [];

        zona_satker_list.forEach(fungsi);

        function fungsi(val, key) {
            console.log("valuenya : " + val);
            nama_zona_satker[key] = val;
            let realisasi = realisasi_publikasi_total[key];
            persen_realisasi[key] = (Math.round(((realisasi / total) * 100) * 100) / 100).toFixed(2)

        }

        const ctx = document.getElementById('bar_chart_berita_satker');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nama_zona_satker,
                datasets: [{
                    label: 'Rangkuman Presentase Berita Satker Terpublikasi (%)',
                    data: persen_realisasi,//[100,2,4,5,6,7,8,9,10,11,12,13,14,5.5,16,17,18,19,20,21,22,23,24,25], //[100.0,75.6,87.8,100.0,91.6,84.9,74.4,86.2,71.7,86.8,83.0,78.5,75.9,85.5,91.6,89.5,94.9,84.0,64.7,90.3,67.9,90.2,80.8,88.4,92.3]
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }],
            },
            options: {
                legend: {
                    labels: {
                        fontColor: 'white'
                    }
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            fontColor: 'white'
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 90,
                            padding: 20,
                            fontColor: 'white'
                        }
                    }]
                },
                plugins: {
                    datalabels: {
                        anchor: 'center',
                        align: 'top',
                        formatter: (value, ctx) => {
                            return value + " %";
                        },
                        color: 'cyan',
                    }
                },
            }
        });
    </script>

    <script>
        $(function () {
            $("#dari, #sampai").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
        });
        $('#frmChart').submit(function () {
            var dari = $('#frmChart').find('#dari').val();
            var sampai = $('#frmChart').find('#sampai').val();
            if (dari == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Pilihan Tanggal Awal Belum Dipilih',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#dari').focus();
                });
                return false;
            } else if (sampai == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Pilihan Tanggal Akhir Belum Dipilih',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#sampai').focus();
                });
                return false;
            }
        });
    </script>


@endpush