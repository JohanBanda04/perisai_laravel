@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">

                    </div>
                    <h2 class="page-title">
                        Rekap Link Berita
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/beritasatker/cetaklaporanberita_rekap" id="frmLaporanBeritaRekap"
                                  target="_blank"
                                  method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                                          d="M0 0h24v24H0z"
                                                                                                          fill="none"/><path
                                                            d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/><path
                                                            d="M16 3l0 4"/><path d="M8 3l0 4"/><path d="M4 11l16 0"/><path
                                                            d="M8 15h2v2h-2z"/></svg>
                                            </span>
                                            <input type="text" value="{{ Request('dari') }}" class="form-control"
                                                   name="dari" id="dari"
                                                   placeholder="Dari" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                                          d="M0 0h24v24H0z"
                                                                                                          fill="none"/><path
                                                            d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/><path
                                                            d="M16 3l0 4"/><path d="M8 3l0 4"/><path d="M4 11l16 0"/><path
                                                            d="M8 15h2v2h-2z"/></svg>
                                            </span>
                                            <input type="text" value="{{ Request('sampai') }}" class="form-control"
                                                   name="sampai" id="sampai"
                                                   placeholder="Sampai" autocomplete="off">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select name="jenis_media" id="jenis_media" class="form-select">
                                                <option value="">-Pilih Jenis Media-</option>
                                                <option value="sosial_media">Link Sosial Media</option>
                                                <option value="media_lokal">Link Media Lokal</option>
                                                <option value="media_nasional">Link Media Nasional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" name="cetakberita_rekap" id="cetakberita_rekap"
                                                    class="btn btn-primary w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-printer" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                                                    <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"/>
                                                </svg>
                                                {{--ASLII--}}
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <button type="submit" name="exportexcelberita_rekap"
                                                    id="exportexcelberita_rekap"
                                                    class="btn btn-success w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-download" width="24"
                                                     height="24"
                                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/>
                                                    <path d="M7 11l5 5l5 -5"/>
                                                    <path d="M12 4l0 12"/>
                                                </svg>
                                                {{--ASLIII--}}
                                                Export to Excel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('myscript')
    <script>
        $(function () {
            $("#dari, #sampai").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
            $('#frmLaporanBeritaRekap').submit(function () {
                var dari = $('#frmLaporanBeritaRekap').find('#dari').val();
                var sampai = $('#frmLaporanBeritaRekap').find('#sampai').val();
                var jenis_media = $('#frmLaporanBeritaRekap').find('#jenis_media').val();
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
                } else if (jenis_media == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Pilihan Jenis Media Belum Dipilih',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#jenis_media').focus();
                    });
                    return false;
                }
            });
        });
    </script>
@endpush