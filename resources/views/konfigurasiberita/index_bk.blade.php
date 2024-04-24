@extends('layouts.admin.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">

                    </div>
                    <h2 class="page-title">
                        Konfigurasi Berita {{ $satker->name }}
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>

                                    @endif
                                    @if(Session::get('warning'))
                                        <div class="alert alert-warning">
                                            {{ Session::get('warning') }}
                                        </div>

                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <a href="#" class="btn btn-primary" id="btnTambahBeritaSatker">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 5l0 14"/>
                                            <path d="M5 12l14 0"/>
                                        </svg>
                                        {{--ASLIII--}}
                                        Tambah Konfigurasi Berita
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="btn btn-primary" id="btnTambahBeritaSatker">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 5l0 14"/>
                                            <path d="M5 12l14 0"/>
                                        </svg>
                                        {{--ASLIII--}}
                                        Tambah Konfigurasi Rekap
                                    </a>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <form action="/datasatker/{{ $satker->kode_satker }}/getberita" method="get"
                                          id="frmBeritaSatkerIndex" name="frmBeritaSatkerIndex">
                                        @csrf

                                        <div class="row">
                                            <div class="col-9">
                                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M4 7v-1a2 2 0 0 1 2 -2h2"/><path d="M4 17v1a2 2 0 0 0 2 2h2"/><path
                                                d="M16 4h2a2 2 0 0 1 2 2v1"/><path d="M16 20h2a2 2 0 0 0 2 -2v-1"/><path
                                                d="M5 11h1v2h-1z"/><path d="M10 11l0 2"/><path d="M14 11h1v2h-1z"/><path
                                                d="M19 11l0 2"/></svg>
                                </span>
                                                    <input type="text" value="{{ Request('nama_berita') }}"
                                                           class="form-control"
                                                           name="nama_satker" id="nama_satker"
                                                           placeholder="Nama Satker">
                                                </div>
                                            </div>
                                            <div class="col-3">
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
                                                        Cari Konfigurasi Satker
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <table class="table table-bordered"
                                           style=" table-layout: fixed !important;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Satker</th>

                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($konfig_satker as $d)
                                            <tr>
                                                <td>{{ ($loop->iteration + $konfig_satker->firstItem()) - 1  }}</td>
                                                <td>{{ date('d-m-Y',strtotime($d->tgl_input)) }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">{{ $d->header }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">{{ $d->footer }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{--{{ $berita_satker->links() }}--}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal modal-blur fade" style="" id="modal-inputberitasatker" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 1000px;" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Berita {{ $satker->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body " style="">
                    <form action="/datasatker/storeberita" method="post" id="frmBeritaSatker" name="frmBeritaSatker"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path
                                                d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                    </svg>
                                </span>
                                    <input readonly type="text" value="{{ $satker->kode_satker }}" class="form-control"
                                           name="kode_satker"
                                           id="kode_satker"
                                           placeholder="Kode Satker">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-file-barcode" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                              d="M0 0h24v24H0z"
                                                                                              fill="none"/><path
                                                d="M14 3v4a1 1 0 0 0 1 1h4"/><path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><path
                                                d="M8 13h1v3h-1z"/><path d="M12 13v3"/><path d="M15 13h1v3h-1z"/>
                                    </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="judul_berita_satker"
                                           id="judul_berita_satker"
                                           placeholder="Judul Berita">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                               d="M9 15l6 -6"/><path
                                               d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                               d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="facebook" id="facebook"
                                           placeholder="Link Facebook">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="website" id="website"
                                           placeholder="Link Website">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="instagram" id="instagram"
                                           placeholder="Link Instagram">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="twitter" id="twitter"
                                           placeholder="Link Twitter">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="tiktok" id="tiktok"
                                           placeholder="Link Tiktok">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="sippn" id="sippn"
                                           placeholder="Link SIPPN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M9 15l6 -6"/><path
                                                d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/><path
                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                                   </svg>
                                </span>
                                    <input type="text" value="" class="form-control" name="youtube" id="youtube"
                                           placeholder="Link Youtube">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
                            <div class="col-12">

                                <div class="form-group">
                                    <div class="input_fields_wrap">
                                        <center><label class="col-lg-12 " style="">Link Tambahan (Media Lokal)</label>
                                        </center>
                                        <button class="add_field_button btn btn-success m-l-15 col-lg-12 "
                                                style="margin-bottom: 15px;">
                                            Tambah Kolom Media Lokal
                                        </button>
                                        <table class="m-l-15 col-lg-12">
                                            <tr class="">

                                                <td class="" style="">
                                                    {{--<label for="">Berita Media Lokal</label>--}}
                                                    <input type="text" name="jumlah[]" class="form-control "
                                                           placeholder="Link Media Lokal">
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
                            <div class="col-12">

                                <div class="form-group">
                                    <div class="input_fields_wrap_nasional">
                                        <center><label class="col-lg-12 " style="">Link Tambahan (Media
                                                Nasional)</label>
                                        </center>
                                        <button class="add_field_button_nasional btn btn-warning m-l-15 col-lg-12 "
                                                style="margin-bottom: 15px;">
                                            Tambah Kolom Media Nasional
                                        </button>
                                        <table class="m-l-15 col-lg-12">
                                            <tr class="">

                                                <td class="" style="">
                                                    {{--<label for="">Berita Media Lokal</label>--}}
                                                    <input type="text" name="jumlah_nasional[]" class="form-control "
                                                           placeholder="Link Media Nasional">
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">
                            <div class="col-12">
                                <div class="form-group" style=" ">
                                    <!--                        <label class="fw-500">Upload File SK / SP / Nodin / Undangan / Paparan / data pendukung lainnya</label>-->
                                    <center><label class="col-lg-12 " style="">Link Tambahan (Media Lokal)</label>
                                    </center>
                                    <br>
                                    <button class="btn btn-success m-l-15 col-lg-12" id="add-more" type="button"
                                            style=" ">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Link
                                    </button>
                                    <small class="lh-1" style="color: red"><i></i></small>

                                    <div id="auth-rows"></div>
                                </div>
                            </div>
                        </div>--}}

                        {{--<div class="row" style="margin-top: 10px;">
                            <div class="col-12">
                                <div class="form-group" style=" ">
                                    <!--                        <label class="fw-500">Upload File SK / SP / Nodin / Undangan / Paparan / data pendukung lainnya</label>-->
                                    <center><label class="col-lg-12 " style="">Link Tambahan (Media Nasional)</label>
                                    </center>
                                    <br>
                                    <button class="btn btn-warning m-l-15 col-lg-12" id="add-more-nasional"
                                            type="button"
                                            style=" ">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Link
                                    </button>
                                    <small class="lh-1" style="color: red"><i></i></small>

                                    <div id="auth-rows-nasional"></div>
                                </div>
                            </div>
                        </div>--}}

                        {{-- <div class="row mt-2">
                             <div class="col-12">
                                 <select name="role_satker" id="role_satker" class="form-select">
                                     <option value="">-Pilih Roles-</option>
                                     <option value="humas_satker">Humas Satker</option>
                                     <option value="humas_kanwil">Humas Kanwil</option>
                                 </select>
                             </div>
                         </div>--}}

                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-send" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M10 14l11 -11"/>
                                            <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"/>
                                        </svg>
                                        {{--ASLIII--}}
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-tampilkandetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadedittampilkandetail">

                </div>
            </div>
        </div>
    </div>
    {{--modal untuk edit--}}
    {{--Modal Edit--}}
    <div class="modal modal-blur fade" id="modal-editsatkerberita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform_berita">

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
@endsection

@push('myscript')
    <script>
        $(function () {
            $("#dari, #sampai").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });

            function checkSelectedFile(id) {


                fileName = document.querySelector('#' + id).value;
                extension = fileName.split('.').pop();


                if (document.getElementById(id).files.length == 0) {
                    console.log("no files selected");
                    $('#' + id).prop('required', true);
                    // $('.text-field').prop('required',true);
                } else {
                    console.log("there are files selected");
                    // $('#'+id).prop('required',false);

                    if (extension != 'pdf' && extension != 'doc' && extension != 'docx') {
                        alert("ekstensi file harus PDF, DOC, atau DOCX");

                        document.querySelector('#' + id).value = '';
                        $('#' + id).prop('required', true);
                    } else {
                        const oFile = document.getElementById(id).files[0];
                        console.log(id);
                        console.log(oFile);
                        $('#' + id).prop('required', false);

                        if (oFile.size > (5 * (1024 * 1024))) // 500Kb for bytes.
                        {
                            alert("size file terlalu besar");
                            document.querySelector('#' + id).value = '';
                            $('#' + id).prop('required', true);
                        }
                    }


                }

            }

            var max_fields = 100; //maximum input boxes allowed
            var max_fields_nasional = 100; //maximum input boxes allowed

            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var wrapper_nasional = $(".input_fields_wrap_nasional"); //Fields wrapper

            var add_button = $(".add_field_button"); //Add button ID
            var add_button_nasional = $(".add_field_button_nasional"); //Add button ID

            var x = 1; //initlal text box count
            var x_nasional = 1; //initlal text box count


            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment

                    $(wrapper).append('<div>' +
                        '<table class="m-l-15 col-lg-12" style="">' +
                        '<tr style="margin-top: 10px">' +
                        '<td>' +


                        '</td>' +
                        '<td style=""><input type="text" name="jumlah[]" class="form-control"  placeholder="Link Media Lokal" >' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '<a href="#" style="margin-left: 10px;" class="remove_field">Remove</a></div>');
                    $('.myselect').select2();
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });

            $(add_button_nasional).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields_nasional) { //max input box allowed
                    x++; //text box increment

                    $(wrapper_nasional).append('<div>' +
                        '<table class="m-l-15 col-lg-12" style="">' +
                        '<tr style="margin-top: 10px">' +
                        '<td>' +


                        '</td>' +
                        '<td style=""><input type="text" name="jumlah_nasional[]" class="form-control"  placeholder="Link Media Nasional" >' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '<a href="#" style="margin-left: 10px;" class="remove_field_nasional">Remove</a></div>');
                    $('.myselect').select2();
                }
            });

            $(wrapper_nasional).on("click", ".remove_field_nasional", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });


            var counter = 0;

            $("#add-more").click(function (e) {
                var html3 = '<div class="form-group input-dinamis " style="margin-bottom: 10px; margin-top: 10px;"><div class="row">' +
                    '<div class="col-input-dinamis col-lg-10">' +
                    '<input type="text" name="url_files[]" class="form-control border-grey" ' +
                    'id="peserta' + counter + '" onchange="checkSelectedFile(id)" ' +
                    'placeholder="Link Media Lokal" required>' +
                    '</div>' +
                    '<div class="col-input-dinamis col-lg-2">' +
                    '<button class="btn btn-danger remove" type="button"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backspace-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 5a2 2 0 0 1 1.995 1.85l.005 .15v10a2 2 0 0 1 -1.85 1.995l-.15 .005h-11a1 1 0 0 1 -.608 -.206l-.1 -.087l-5.037 -5.04c-.809 -.904 -.847 -2.25 -.083 -3.23l.12 -.144l5 -5a1 1 0 0 1 .577 -.284l.131 -.009h11zm-7.489 4.14a1 1 0 0 0 -1.301 1.473l.083 .094l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.403 1.403l.094 -.083l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.403 -1.403l-.083 -.094l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.403 -1.403l-.094 .083l-1.293 1.292l-1.293 -1.292l-.094 -.083l-.102 -.07z" stroke-width="0" fill="currentColor" />' +
                    '</svg><' +
                    '/button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';


                $('#auth-rows').append(html3);
                counter++;
            });

            $('#auth-rows').on('click', '.remove', function (e) {
                e.preventDefault();
                $(this).parents('.input-dinamis').remove();
            });

            var counter_nasional = 0;

            $("#add-more-nasional").click(function (e) {
                var html3 = '<div class="form-group input-dinamis-nasional " style="margin-bottom: 10px; margin-top: 10px;"><div class="row">' +
                    '<div class="col-input-dinamis-nasional col-lg-10">' +
                    '<input type="text" name="url_files_nasional[]" class="form-control border-grey" ' +
                    'id="peserta' + counter_nasional + '" onchange="checkSelectedFile(id)" ' +
                    'placeholder="Link Media Nasional" required>' +
                    '</div>' +
                    '<div class="col-input-dinamis-nasional col-lg-2">' +
                    '<button class="btn btn-danger remove-nasional" type="button"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backspace-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 5a2 2 0 0 1 1.995 1.85l.005 .15v10a2 2 0 0 1 -1.85 1.995l-.15 .005h-11a1 1 0 0 1 -.608 -.206l-.1 -.087l-5.037 -5.04c-.809 -.904 -.847 -2.25 -.083 -3.23l.12 -.144l5 -5a1 1 0 0 1 .577 -.284l.131 -.009h11zm-7.489 4.14a1 1 0 0 0 -1.301 1.473l.083 .094l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.403 1.403l.094 -.083l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.403 -1.403l-.083 -.094l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.403 -1.403l-.094 .083l-1.293 1.292l-1.293 -1.292l-.094 -.083l-.102 -.07z" stroke-width="0" fill="currentColor" />' +
                    '</svg><' +
                    '/button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';


                $('#auth-rows-nasional').append(html3);
                counter_nasional++;
            });

            $('#auth-rows-nasional').on('click', '.remove-nasional', function (e) {
                e.preventDefault();
                $(this).parents('.input-dinamis-nasional').remove();
            });


            $('#btnTambahBeritaSatker').click(function () {
                $('#modal-inputberitasatker').modal('show');
            });

            $('.tampilkandetail').click(function () {
                var id_berita = $(this).attr('id_berita');
                //alert(id_berita);
                $.ajax({
                    type: 'POST',
                    url: '/datasatker/tampilkandetailberita',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_berita: id_berita,
                    },
                    success: function (respond) {
                        $('#loadedittampilkandetail').html(respond);
                    }
                });
                $('#modal-tampilkandetail').modal('show');
            });

            $('.editberita').click(function () {
                var id_berita = $(this).attr('id_berita');
                //alert(id_berita);
                $.ajax({
                    type: 'POST',
                    url: '/datasatker/editberita',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_berita: id_berita,
                    },
                    success: function (respond) {
                        $('#loadeditform_berita').html(respond);
                    }
                });
                $('#modal-editsatkerberita').modal('show');
            });
            $('.edit').click(function () {
                var id_satker = $(this).attr('id_satker');
                //alert(id_satker);
                $.ajax({
                    type: 'POST',
                    url: '/satker/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_satker: id_satker,

                    },
                    success: function (respond) {
                        $('#loadeditform').html(respond);
                    }
                });
                $('#modal-editsatker').modal('show');
            });

            $('.delete-confirm-berita').click(function (e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: "Apakah Anda Yakin Data Ini Mau Di Hapus?",
                    text: "Jika Ya Maka Data Akan Terhapus Permanent",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus Saja!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Data Berhasil Dihapus",
                            icon: "success"
                        });
                    }
                });
            });

            $('#frmBeritaSatker').submit(function () {
                var kode_satker = $('#frmBeritaSatker').find('#kode_satker').val();
                var judul_berita_satker = $('#frmBeritaSatker').find('#judul_berita_satker').val();
                var facebook = $('#frmBeritaSatker').find('#facebook').val();
                var website = $('#frmBeritaSatker').find('#website').val();
                var instagram = $('#frmBeritaSatker').find('#instagram').val();
                var twitter = $('#frmBeritaSatker').find('#twitter').val();
                var tiktok = $('#frmBeritaSatker').find('#tiktok').val();
                var sippn = $('#frmBeritaSatker').find('#sippn').val();
                var youtube = $('#frmBeritaSatker').find('#youtube').val();

                if (kode_satker == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Kode Satker Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#kode_satker').focus();
                    });
                    return false;
                } else if (judul_berita_satker == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Judul Berita Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#judul_berita_satker').focus();
                    });
                    return false;
                } else if (facebook == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Facebook Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#facebook').focus();
                    });
                    return false;
                } else if (website == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Website Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#website').focus();
                    });
                    return false;
                } else if (instagram == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Instagram Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#instagram').focus();
                    });
                    return false;
                } else if (twitter == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Twitter Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#twitter').focus();
                    });
                    return false;
                } else if (tiktok == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Tiktok Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#tiktok').focus();
                    });
                    return false;
                } else if (sippn == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link SIPPN Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#sippn').focus();
                    });
                    return false;
                } else if (youtube == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Link Youtube Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#youtube').focus();
                    });
                    return false;
                }
            });

            {{--function loadberita(){--}}
            {{--var tanggal_awal = $('#tanggal_awal').val();--}}
            {{--var kode_satker = $('#kode_satker').val();--}}
            {{--//alert(kode_satker);--}}

            {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: '/datasatker/'+ kode_satker +'/getberitabytanggal',--}}
            {{--data: {--}}
            {{--_token: "{{ csrf_token() }}",--}}
            {{--tanggal_awal: tanggal_awal,--}}
            {{--},--}}
            {{--cache: false,--}}
            {{--success: function(respond){--}}
            {{--console.log(respond);--}}
            {{--}--}}
            {{--});--}}
            {{--}--}}
            {{--$('#tanggal_awal').change(function(e){--}}
            {{--loadberita();--}}
            {{--});--}}
            {{--loadberita();--}}
        });
    </script>
@endpush

