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
                        Data Konfigurasi Berita
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
                                <div class="col-12">
                                    <a href="#" class="btn btn-primary" id="btnTambahBeritaSatkerKonfig">
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
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <form action="/konfigberita/konfiglaporanberita" method="get"
                                          id="frmBeritaSatkerIndexKonfig" name="frmBeritaSatkerIndexKonfig">
                                        @csrf
                                        <div class="row">
                                            @can('admin')
                                                <div class="col-5">
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
                                                        {{--<input type="text" value="{{ Request('nama_berita') }}"--}}
                                                        {{--class="form-control"--}}
                                                        {{--name="nama_satker" id="nama_satker"--}}
                                                        {{--placeholder="Nama Satker">--}}
                                                        <select name="kode_satker_search" id="kode_satker_search"
                                                                class="form-control">
                                                            <option value="">-Pilih Satker-</option>
                                                            @foreach($satker as $i=>$dts)
                                                                <option {{  Request('kode_satker_search')==$dts->kode_satker?'selected':'' }}
                                                                        value="{{ $dts->kode_satker }}">
                                                                    {{ $dts->name }} ({{ $dts->kode_satker }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endcan
                                            @if(auth()->user()->roles=="superadmin")
                                                <div class="col-5">
                                            @elseif(auth()->user()->roles=='humas_kanwil' || auth()->user()->roles=='humas_satker')
                                                <div class="col-10">
                                            @endif

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
                                                                <input type="text"
                                                                       value="{{ Request('nama_konfigurasi_search') }}"
                                                                       class="form-control"
                                                                       name="nama_konfigurasi_search"
                                                                       id="nama_konfigurasi_search"
                                                                       placeholder="Nama Konfigurasi">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <button class="btn btn-primary" style="width: 150px"
                                                                        type="submit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="icon icon-tabler icon-tabler-search"
                                                                         width="24"
                                                                         height="24"
                                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                                         stroke="currentColor" fill="none"
                                                                         stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none"/>
                                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                                                                        <path d="M21 21l-6 -6"/>
                                                                    </svg>
                                                                    Cari Data Konfig
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
                                            <th>Nama Konfig</th>
                                            <th>Nama Satker</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($konfig as $id=>$dt)
                                            <tr>
                                                <td>{{ ($loop->iteration + $konfig->firstItem()) - 1  }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">{{ $dt->name_config }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">{{ $dt->name }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">{{ $dt->jenis_konfig }}</td>
                                                <td style=" max-width: -moz-fit-content; max-width: fit-content;
                                           margin: 0 auto; overflow-x: auto; white-space: nowrap;">
                                                    <div class="btn-group">
                                                        {{--edit disini--}}
                                                        <a href="#" class="tampilkandetailkonfig btn btn-warning btn-sm"
                                                           id_konfig="{{ $dt->id_konfig }}"
                                                           style="margin-right: 5px; border-radius: 5px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="icon icon-tabler icon-tabler-file-description"
                                                                 width="24" height="24" viewBox="0 0 24 24"
                                                                 stroke-width="1.5" stroke="currentColor" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                                                                <path d="M9 17h6"/>
                                                                <path d="M9 13h6"/>
                                                            </svg>
                                                        </a>
                                                        <a hidden href="#" class="edit btn btn-success btn-sm"
                                                           id_satker=""
                                                           style="margin-right: 5px; border-radius: 5px">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="icon icon-tabler icon-tabler-details" width="24"
                                                                 height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                                 stroke="currentColor" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M11.999 3l.001 17"/>
                                                                <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"/>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="editkonfig btn-sm"
                                                           style="background-color: #3ebc16; border-radius: 5px;
                                                           color: white"
                                                           id_konfig_edit="{{ $dt->id_konfig }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="icon icon-tabler icon-tabler-edit" width="24"
                                                                 height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                 stroke="currentColor" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                                <path d="M16 5l3 3"/>
                                                            </svg>
                                                        </a>
                                                        <form action="/konfigberita/{{ $dt->id_konfig }}/deletekonfig"
                                                              method="post"
                                                              style="margin-left: 5px">
                                                            @csrf
                                                            {{--                                                            @method('DELETE')--}}
                                                            <a style="height: 20px; border-radius: 5px;"
                                                               class="btn btn-danger btn-sm delete-confirm-konfig">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="icon icon-tabler icon-tabler-trash-filled"
                                                                     width="24" height="24" viewBox="0 0 24 24"
                                                                     stroke-width="2" stroke="currentColor" fill="none"
                                                                     stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                    <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                                                                          stroke-width="0" fill="currentColor"/>
                                                                    <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                                                          stroke-width="0" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{ $konfig->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal modal-blur fade" style="" id="modal-inputberitasatkerkonfig" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 1000px;" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Konfigurasi Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body " style="">
                    <form action="/konfigberita/storekonfig" method="post" id="frmBeritaSatkerKonfig"
                          name="frmBeritaSatkerKonfig"
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
                                    <select name="kode_satker_konfig" id="kode_satker_konfig" class="form-control">
                                        @if(auth()->user()->roles=='humas_kanwil' || auth()->user()->roles=='humas_satker')
                                            @php
                                                $satker = DB::table('satker')->where('kode_satker', auth()->user()->kode_satker)->first();

                                            @endphp
                                            <option selected
                                                    value="{{ auth()->user()->kode_satker }}">
                                                {{ $satker->name  }} ({{ $satker->kode_satker }})
                                            </option>
                                        @elseif(auth()->user()->roles=='superadmin')
                                            <option value="">-Pilih Satker-</option>
                                            @foreach($satker as $key=>$d)
                                                <option value="{{ $d->kode_satker }}">{{ $d->name }}
                                                    ( {{ $d->kode_satker }}
                                                    )
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

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
                                    <input type="text" value="" class="form-control" name="nama_konfig"
                                           id="nama_konfig"
                                           placeholder="Nama Konfigurasi (Ex: Konfigurasi Berita 1)">
                                    {{--ASLIII--}}

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
                                    <input type="text" value="" class="form-control" name="salam_pembuka"
                                           id="salam_pembuka"
                                           placeholder="Salam Pembuka (ex: Assalamualaikum Wr. Wb.)">
                                    {{--ASLIII--}}
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
                                    <input type="text" value="" class="form-control" name="yth" id="yth"
                                           placeholder="Yth (Ex: Yth. Bapak Kepala Kanwil Kemenkumham HAM NTB)">
                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
                            <div class="col-12">

                                <div class="form-group">
                                    <div class="input_fields_wrap">
                                        <center><label class="col-lg-12 " style="">Tembusan Yth</label>
                                        </center>
                                        <button class="add_field_button btn btn-success m-l-15 col-lg-12 "
                                                style="margin-bottom: 15px;">
                                            Tambah Kolom Tembusan Yth
                                        </button>
                                        <table class="m-l-15 col-lg-12">
                                            <tr class="">

                                                <td class="" style="">
                                                    {{--<label for="">Berita Media Lokal</label>--}}
                                                    <input type="text" name="jumlah_tembusan_yth[]"
                                                           class="form-control "
                                                           placeholder="Tembusan Yth (Ex: KADIVPAS NTB (PEMASYARAKATAN))">
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
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
                                    <input type="text" value="" class="form-control" name="dari_pengirim"
                                           id="dari_pengirim"
                                           placeholder="Dari (Ex: Kepala Lapas Lobar)">
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
                                    <input type="text" value="" class="form-control" name="pengantar" id="pengantar"
                                           placeholder="Pengantar (Ex: Bersama ini dilaporkan kepada Bapak KAKANWIL xxxxxxxx)">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
                            <div class="col-12">

                                <div class="form-group">
                                    <div class="input_fields_wrap_nasional">
                                        <center><label class="col-lg-12 " style="">Hashtag</label>
                                        </center>
                                        <button class="add_field_button_nasional btn btn-warning m-l-15 col-lg-12 "
                                                style="margin-bottom: 15px;">
                                            Tambah Kolom Hashtag
                                        </button>
                                        <table class="m-l-15 col-lg-12">
                                            <tr class="">

                                                <td class="" style="">
                                                    {{--<label for="">Berita Media Lokal</label>--}}
                                                    <input type="text" name="jumlah_hashtag[]" class="form-control "
                                                           placeholder="Hashtag (ex: #Parlindungan)">
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
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
                                    <input type="text" value="" class="form-control" name="jargon" id="jargon"
                                           placeholder="Jargon (Ex: Kumham NTB PASTI JUARE)">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
                            <div class="col-12">

                                <div class="form-group">
                                    <div class="input_fields_wrap_nasional_moto">
                                        <center><label class="col-lg-12 " style="">Moto</label>
                                        </center>
                                        <button class="add_field_button_nasional_moto btn btn-primary m-l-15 col-lg-12 "
                                                style="margin-bottom: 15px; background-color: #2c4974 !important;">
                                            Tambah Kolom Moto
                                        </button>
                                        <table class="m-l-15 col-lg-12">
                                            <tr class="">

                                                <td class="" style="">
                                                    {{--<label for="">Berita Media Lokal</label>--}}
                                                    <input type="text" name="jumlah_moto[]" class="form-control "
                                                           placeholder="Moto (ex: Juare,Unggul,Amanah,Ramah,Excellent)">
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
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
                                    <input type="text" value="" class="form-control" name="penutup" id="penutup"
                                           placeholder="Penutup (Ex: Matur Tampiasih)">
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
                                    <input type="text" value="" class="form-control" name="salam_penutup"
                                           id="salam_penutup"
                                           placeholder="Salam Penutup (Ex: Terima kasih, Wassalamu'alaikum Wr. Wb.)">
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

    <div class="modal modal-blur fade" id="modal-tampilkandetailkonfig" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Konfigurasi Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadedittampilkandetailkonfig">

                </div>
            </div>
        </div>
    </div>
    {{--modal untuk edit--}}
    {{--Modal Edit--}}
    <div class="modal modal-blur fade" id="modal-editsatkerkonfig" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Konfigurasi Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform_konfig">

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
            var max_fields_nasional_moto = 100; //maximum input boxes allowed

            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var wrapper_nasional = $(".input_fields_wrap_nasional"); //Fields wrapper
            var wrapper_nasional_moto = $(".input_fields_wrap_nasional_moto"); //Fields wrapper

            var add_button = $(".add_field_button"); //Add button ID
            var add_button_nasional = $(".add_field_button_nasional"); //Add button ID
            var add_button_nasional_moto = $(".add_field_button_nasional_moto"); //Add button ID

            var x = 1; //initlal text box count
            var x_nasional = 1; //initlal text box count
            var x_nasional_moto = 1; //initlal text box count

            /*===============================================================*/
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment

                    $(wrapper).append('<div>' +
                        '<table class="m-l-15 col-lg-12" style="">' +
                        '<tr style="margin-top: 10px">' +
                        '<td>' +


                        '</td>' +
                        '<td style=""><input type="text" name="jumlah_tembusan_yth[]" class="form-control"  ' +
                        'placeholder="Tembusan Yth (Ex: KADIVPAS NTB (PEMASYARAKATAN))" >' +
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

            /*=======================================================================*/
            $(add_button_nasional).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields_nasional) { //max input box allowed
                    x++; //text box increment

                    $(wrapper_nasional).append('<div>' +
                        '<table class="m-l-15 col-lg-12" style="">' +
                        '<tr style="margin-top: 10px">' +
                        '<td>' +


                        '</td>' +
                        '<td style=""><input type="text" name="jumlah_hashtag[]" class="form-control"  ' +
                        'placeholder="Hashtag (ex: #Parlindungan)" >' +
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

            /*========================================================================*/

            $(add_button_nasional_moto).click(function (e) { //on add input button click
                e.preventDefault();
                if (x_nasional_moto < max_fields_nasional_moto) { //max input box allowed
                    x_nasional_moto++; //text box increment

                    $(wrapper_nasional_moto).append('<div>' +
                        '<table class="m-l-15 col-lg-12" style="">' +
                        '<tr style="margin-top: 10px">' +
                        '<td>' +


                        '</td>' +
                        '<td style=""><input type="text" name="jumlah_moto[]" class="form-control"  ' +
                        'placeholder="Moto (ex: Juare,Unggul,Amanah,Ramah,Excellent)" >' +
                        '</td>' +
                        '</tr>' +
                        '</table>' +
                        '<a href="#" style="margin-left: 10px;" class="remove_field">Remove</a></div>');
                    $('.myselect').select2();
                }
            });

            $(wrapper_nasional_moto).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x_nasional_moto--;
            });

            /*=========================================================================*/
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


            $('#btnTambahBeritaSatkerKonfig').click(function () {
                $('#modal-inputberitasatkerkonfig').modal('show');
            });

            $('.tampilkandetailkonfig').click(function () {
                var id_konfig = $(this).attr('id_konfig');
                //alert(id_konfig);
                $.ajax({
                    type: 'POST',
                    url: '/konfigberita/tampilkandetailkonfig',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_konfig: id_konfig,
                    },
                    success: function (respond) {
                        $('#loadedittampilkandetailkonfig').html(respond);
                    }
                });
                $('#modal-tampilkandetailkonfig').modal('show');
            });

            $('.editkonfig').click(function () {
                var id_konfig_edit = $(this).attr('id_konfig_edit');
                //alert(id_konfig_edit);
                $.ajax({
                    type: 'POST',
                    url: '/konfigberita/editkonfig',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_konfig: id_konfig_edit
                    },
                    success: function (respond) {
                        $('#loadeditform_konfig').html(respond);
                    }
                });
                $('#modal-editsatkerkonfig').modal('show');

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

            $('.delete-confirm-konfig').click(function (e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: "Apakah Anda Yakin Data Ini Mau Di Hapus?",
                    text: "Jika Ya Maka Data Akan Terhapus Permanent",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Batalkan Saja Bro!",
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

            $('#frmBeritaSatkerKonfig').submit(function () {
                var kode_satker_konfig = $('#frmBeritaSatkerKonfig').find('#kode_satker_konfig').val();
                var salam_pembuka = $('#frmBeritaSatkerKonfig').find('#salam_pembuka').val();
                var yth = $('#frmBeritaSatkerKonfig').find('#yth').val();
                var dari_pengirim = $('#frmBeritaSatkerKonfig').find('#dari_pengirim').val();
                var pengantar = $('#frmBeritaSatkerKonfig').find('#pengantar').val();
                var jargon = $('#frmBeritaSatkerKonfig').find('#jargon').val();
                var penutup = $('#frmBeritaSatkerKonfig').find('#penutup').val();
                var salam_penutup = $('#frmBeritaSatkerKonfig').find('#salam_penutup').val();


                if (kode_satker_konfig == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Kode Satker Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#kode_satker_konfig').focus();
                    });
                    return false;
                } else if (salam_pembuka == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Salam Pembuka Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#salam_pembuka').focus();
                    });
                    return false;
                } else if (yth == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Yth' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#yth').focus();
                    });
                    return false;
                } else if (dari_pengirim == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Dari' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#dari_pengirim').focus();
                    });
                    return false;
                } else if (pengantar == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Pengantar' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#pengantar').focus();
                    });
                    return false;
                } else if (jargon == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Jargon' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#jargon').focus();
                    });
                    return false;
                } else if (penutup == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Penutup' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#penutup').focus();
                    });
                    return false;
                } else if (salam_penutup == "") {
                    //alert("NIK Harus Diisi");
                    Swal.fire({
                        title: 'Warning!',
                        text: "Kolom 'Salam Penutup' Harus Diisi",
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        $('#salam_penutup').focus();
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

