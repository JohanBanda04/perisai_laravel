@extends('layouts.admin.tabler')

@section('content')
    {{--<div class="page-header d-print-none">--}}
    {{--<div class="container-xl">--}}
    {{--<div class="row g-2 align-items-center">--}}
    {{--<div class="col-12">--}}
    {{--<center>--}}
    {{--<h2>Update Profile Satker {{ auth() ->user()->name}}</h2>--}}
    {{--</center>--}}


    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="page-body">
        <div class="container-xl">

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <center>
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
                                    </center>

                                </div>
                                <div class="col-2"></div>
                            </div>
                            {{--disnit--}}
                            <div class="row">
                                <div class="col-12">
                                    <center><h2>Update Profile {{ auth() ->user()->name}}</h2></center>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @php
                                        $explode = explode('_',$satker->roles);

                                    @endphp
                                    @if(sizeof($explode)==1)
                                        <center><h2>({{ ucfirst($explode[0]) }})</h2></center>
                                    @else
                                        <center><h2>({{ ucfirst($explode[0])." ".ucfirst($explode[1]) }})</h2></center>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="panel panel-flat">
                                        <div class="panel-body">
                                            <center>
                                                <img src="{{ asset('assets/img/no-photo.png') }}" alt="" class="foto"
                                                     width="80px" height="80px" style="border-radius: 40%;">
                                            </center>

                                        </div>
                                    </div>
                                    <div class="panel panel-flat">
                                        <div class="panel-body">
                                            <fieldset class="content-group">
                                                <center>
                                                    <legend class="text-bold"><i class="icon-user"></i>
                                                        GANTI PASSWORD
                                                    </legend>
                                                </center>

                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="modal-content" style="">

                                        <div class="modal-body " style="">
                                            <form action="/profilesatker/{{ $satker->kode_satker }}/updatepassword"
                                                  method="post" id="frmUpdatePasswordSatker"
                                                  name="frmUpdatePasswordSatker"
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
                                                            <input readonly type="text"
                                                                   value="{{ $satker->name }}"
                                                                   class="form-control"
                                                                   name="satker_name"
                                                                   id="satker_name"
                                                                   placeholder="Nama Satker">

                                                            <input readonly type="hidden"
                                                                   value="{{ $satker->kode_satker }}"
                                                                   class="form-control"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-key"><path
                                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z"/><path
                                                d="M15 9h.01"/></svg>
                                </span>
                                                            <input type="password" autocomplete="off" value=""
                                                                   class="form-control"
                                                                   name="password_lama"
                                                                   id="password_lama"
                                                                   placeholder="Password Lama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-key"><path
                                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z"/><path
                                                d="M15 9h.01"/></svg>
                                </span>
                                                            <input type="password" autocomplete="off" value=""
                                                                   class="form-control"
                                                                   name="password_baru"
                                                                   id="password_baru"
                                                                   placeholder="Password Baru">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-key"><path
                                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z"/><path
                                                d="M15 9h.01"/></svg>
                                </span>
                                                            <input type="password" autocomplete="off" value=""
                                                                   class="form-control"
                                                                   name="konfirmasi_password_baru"
                                                                   id="konfirmasi_password_baru"
                                                                   placeholder="Konfirmasi Password Baru">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary w-100">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round"
                                                                     class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"/>
                                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
                                                                    <path d="M14 4l0 4l-6 0l0 -4"/>
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
                                <div class="col-md-2"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>


            </div>

        </div>


        @endsection

        @push('myscript')
            <script>
                $(function () {
                    $('#btnTambahSatker').click(function () {
                        $('#modal-inputsatker').modal('show');
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

                    $('.delete-confirm').click(function (e) {
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

                    $('#frmUpdatePasswordSatker').submit(function () {
                        var password_lama = $('#frmUpdatePasswordSatker').find('#password_lama').val();
                        var password_baru = $('#frmUpdatePasswordSatker').find('#password_baru').val();
                        var konfirmasi_password_baru = $('#frmUpdatePasswordSatker').find('#konfirmasi_password_baru').val();


                        if (password_lama == "") {
                            //alert("NIK Harus Diisi");
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Password Lama Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#password_lama').focus();
                            });
                            return false;
                        } else if (password_baru == "") {
                            //alert("NIK Harus Diisi");
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Password Baru Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#password_baru').focus();
                            });
                            return false;
                        } else if (konfirmasi_password_baru == "") {
                            //alert("NIK Harus Diisi");
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Konfirmasi Password Baru Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#konfirmasi_password_baru').focus();
                            });
                            return false;
                        } else if (password_baru != konfirmasi_password_baru) {
                            //alert("NIK Harus Diisi");
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Password Baru dan Konfirmasi Password Baru Tidak Cocok',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#konfirmasi_password_baru').focus();
                            });
                            return false;
                        }
                    });

                    $('#tambahfrmSatker').submit(function () {
                        var kode_satker = $('#tambahfrmSatker').find('#kode_satker').val();
                        var nama_satker = $('#tambahfrmSatker').find('#nama_satker').val();
                        var email = $('#tambahfrmSatker').find('#email').val();
                        var no_hp = $('#tambahfrmSatker').find('#no_hp').val();
                        var password = $('#tambahfrmSatker').find('#password').val();


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
                        } else if (nama_satker == "") {
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Nama Satker Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#nama_satker').focus();
                            });
                            return false;
                        } else if (email == "") {
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Email Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#email').focus();
                            });
                            return false;
                        } else if (no_hp == "") {
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Nomor HP Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#no_hp').focus();
                            });
                            return false;
                        } else if (password == "") {
                            Swal.fire({
                                title: 'Warning!',
                                text: 'Password Harus Diisi',
                                icon: 'warning',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                $('#password').focus();
                            });
                            return false;
                        }
                    });
                });
            </script>
    @endpush