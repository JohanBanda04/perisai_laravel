@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">

                    </div>
                    <h2 class="page-title">
                        Konfigurasi Link Berita
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
                            <form action="/beritasatker/cetaklaporanberita" id="frmKonfigLaporanBerita"
                                  name="frmKonfigLaporanBerita"
                                  method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select name="kode_satker" id="kode_satker" class="form-select">
                                                <option value="">-Pilih Satker-</option>
                                                @foreach($satker as $key=>$d)
                                                    @if($d->roles!='superadmin')
                                                        <option value="{{ $d->kode_satker }}">{{ $d->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="col-lg-12">Header <b id='wajib_isi'>*</b></label>
                                            <div class="col-lg-12 mt-2">
                                                <input type="text" name="header_berita"id="header_berita"
                                                       class="form-control" value="" placeholder="Header Berita"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="col-lg-12">Footer <b id='wajib_isi'>*</b></label>
                                            <div class="col-lg-12 mt-2">
                                                <input type="text" name="footer_berita"id="footer_berita"
                                                       class="form-control" value="" placeholder="Footer Berita"
                                                       required>
                                            </div>
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
        });
    </script>
@endpush