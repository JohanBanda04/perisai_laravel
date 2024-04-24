<form action="/konfigberita/{{ $konfig->id_konfig }}/updatekonfig_rekap" method="post" id="frmSatkerKonfigEdit" name="frmSatkerKonfigEdit"
      enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path
                                d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                    </svg>
                </span>


                <input readonly type="text" value="{{ $satker->name }} ( {{ $satker->kode_satker }} )"
                       class="form-control"
                       name="kode_satker_view"
                       id="kode_satker_view"
                       placeholder="Kode Satker">
                <input readonly type="hidden" value="{{ $satker->kode_satker }}" class="form-control"
                       name="kode_satker_edit"
                       id="kode_satker_edit"
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
                <input type="text" value="{{ $konfig->name_config }}" class="form-control" name="nama_konfig_edit"
                       id="nama_konfig_edit"
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
                <input type="text" value="{{ $konfig->salam_pembuka }}" class="form-control" name="salam_pembuka_edit"
                       id="salam_pembuka_edit"
                       placeholder="Salam Pembuka">
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
                <input type="text" value="{{ $konfig->yth }}" class="form-control" name="yth_edit"
                       id="yth_edit"
                       placeholder="Yth">
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
                <input type="text" value="{{ $konfig->dari_pengirim }}" class="form-control" name="dari_pengirim_edit"
                       id="dari_pengirim_edit"
                       placeholder="Dari (Ex: Dari : Kepala Lapas Lobar)">
                {{--ASLIII--}}
            </div>
        </div>
    </div>

    {{--INI CARA UNTUK HAPUS TEMBUSAN YTH DINAMIS : --}}
    <div class="row" style="margin-bottom: 10px; margin-top: 15px;">
        <div class="col-12">
            <div class="form-group">
                <div class="input_fields_wrap_edit">
                    <center><label class="col-lg-12 " style="">Tembusan Yth</label>
                    </center>
                    {{--<button class="add_field_button_edit btn btn-success m-l-15 col-lg-12 "--}}
                            {{--style="margin-bottom: 15px;">--}}
                    <button onclick="addFileTembusan(<?= $konfig->id_konfig ?>)"
                            class="btn btn-success m-l-15 col-lg-12"
                            style="margin-bottom: 15px;">
                        Tambah Kolom Tembusan
                    </button>

                    <?php
                    $tembusan_yth = json_decode($konfig->jumlah_tembusan_yth);
                    ?>
                    @foreach($tembusan_yth??[] as $key=>$tembusan_y)

                        <div class="row" id="list-file-yth-<?= $key; ?>-<?= $konfig->id_konfig; ?>">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <div class="row">
                                        <div class="col-input-dinamis col-lg-10 " style="overflow: auto">
                                            <input type="text" value="{{ $tembusan_y }}" name="url_files_tembusan[]"
                                                   class="form-control border-grey"
                                                   placeholder="Tembusan Yth (Ex: Tembusan Yth : KADIVPAS NTB (PEMASYARAKATAN))">
                                        </div>
                                        <div class="col-input-dinamis col-lg-1">

                                            <a style="" href="javascript:;"
                                               class=""
                                               onclick="deleteFileTembusan('<?php echo $tembusan_y;?>','<?= $key; ?>', '<?= $konfig->id_konfig; ?>')">
                                                <i class="fa fa-trash btn btn-danger">Hapus</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="mt-2" id="show-file-list-yth-<?= $konfig->id_konfig; ?>"></div>
                </div>
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
                <input type="text" value="{{ $konfig->pengantar }}" class="form-control" name="pengantar_edit"
                       id="pengantar_edit"
                       placeholder="Pengantar (Ex: Bersama ini dilaporkan kepada Bapak KAKANWIL xxxxxxxx)">
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
                <input type="text" value="{{ $konfig->salam_penutup }}" class="form-control" name="salam_penutup_edit"
                       id="salam_penutup_edit"
                       placeholder="Salam Penutup (Ex: Terima kasih, Wassalamu'alaikum Wr. Wb.)">
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
                <input type="text" value="{{ $konfig->ttd_kakanwil }}" class="form-control" name="ttd_kakanwil_edit"
                       id="ttd_kakanwil_edit"
                       placeholder="Tertanda Kakanwil (Ex: KAKANWIL KEMENKUMHAM NTB)">
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
                <input type="text" value="{{ $konfig->nama_kakanwil }}" class="form-control" name="nama_kakanwil_edit"
                       id="nama_kakanwil_edit"
                       placeholder="Nama Kakanwil (Ex: PARLINDUNGAN)">
                {{--ASLIII--}}
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"/>
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"/>
                    </svg>
                    Update Data
                </button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">

    $(document).ready(function () {
        console.log("ready!");

        //$('#lamp_surat_permohonan_edit').prop('required', true);
        //$('#draft_harmonisasi_edit').prop('required', true);
        //$('#naskah_akademik_edit').prop('required', false);

    });


    var count = 0;

    function deleteFile_old($link, $key, $id_berita) {
        // $path = nama file;
        // $file_id = index file dari record db;
        // $row_id= id unique;
        // confirm("Hapus File?",);
        if (confirm("Hapus File Lampiran?") == true) {
            $.post("/datasatker/hapuslink", {

                link: $link,
                key: $key,
                id_berita: $id_berita,
            }).done(function (response) {
                // console.log(response);
                console.log("tes");
                //$("#list-file-"+$file_id+"-"+$row_id).remove();
                $("#list-file-" + key + "-" + id_berita).remove();
            });
        }

        // alert("tesss");

    }

    function checkFileExtension_edit(id) {
        fileName = document.querySelector('#' + id).value;
        extension = fileName.split('.').pop();

        if (extension != "pdf" && extension != "doc" && extension != "docx") {
            alert("ekstensi file harus PDF, DOC, atau DOCX");

            document.querySelector('#' + id).value = '';
        }
        const oFile = document.getElementById(id).files[0];
        console.log(id);
        console.log(oFile);

        if (oFile.size > 5 * 1024 * 1024) // 500Kb for bytes.
        {
            alert("size file terlalu besar");

            document.querySelector('#' + id).value = '';
        }
    }

    function removeFileMoto(element) {
        console.log("xxxx");
        document.getElementById(element).remove();
    }

    function removeFileTembusan(element) {
        console.log("xxxxTembusan");
        document.getElementById(element).remove();
    }

    function removeFileHashtag(element) {
        console.log("xxxxHashtag");
        document.getElementById(element).remove();
    }

    var count_tembusan = 0;
    var count_hashtag = 0;
    var count_moto = 0;

    function addFileHashtag($row_id_konfig) {
        console.log($row_id_konfig+"hashtag");
        let elementIdHashtag = "input-file-element-hashtag-" + count_hashtag;
        let divIdHashtag = "input-dinamis-edit-hashtag-" + count_hashtag;

        var html4 = '<div class="form-group input-dinamis m-20 mt-2" id="' + divIdHashtag + '">' +
            '<div class="row">' +
            '<div class="col-input-dinamis col-lg-10 ">' +
            '<input type="text" name="url_files_hashtag[]" class="form-control border-grey" ' +
            'id="' + elementIdHashtag + '" onchange="" ' +
            'placeholder="Hashtag (ex: #Parlindungan)" required>' +
            '</div>' +
            '<div class="col-input-dinamis col-lg-2">' +
            '<button class="btn btn-danger remove-edit" ' +
            'onclick="removeFileHashtag(' + "'" + divIdHashtag + "'" + ')" type="button">' +
            'Hapus' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#show-file-list-hashtag-' + $row_id_konfig).append(html4);
        count_hashtag++;
    }
    function addFileTembusan($row_id_konfig) {
        console.log($row_id_konfig+"tembusan");
        let elementIdTembusan = "input-file-element-tembusan-" + count_tembusan;
        let divIdTembusan = "input-dinamis-edit-tembusan-" + count_tembusan;

        var html4 = '<div class="form-group input-dinamis m-20 mt-2" id="' + divIdTembusan + '">' +
            '<div class="row">' +
            '<div class="col-input-dinamis col-lg-10 ">' +
            '<input type="text" name="url_files_tembusan[]" class="form-control border-grey" ' +
            'id="' + elementIdTembusan + '" onchange="" ' +
            'placeholder="Tembusan Yth (Ex: Tembusan Yth : KADIVPAS NTB (PEMASYARAKATAN))" required>' +
            '</div>' +
            '<div class="col-input-dinamis col-lg-2">' +
            '<button class="btn btn-danger remove-edit" ' +
            'onclick="removeFileTembusan(' + "'" + divIdTembusan + "'" + ')" type="button">' +
            'Hapus' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#show-file-list-yth-' + $row_id_konfig).append(html4);
        count_tembusan++;
    }

    function addFileMoto($row_id_konfig) {
        console.log($row_id_konfig);
        let elementIdMoto = "input-file-element-moto-" + count_moto;
        let divIdMoto = "input-dinamis-edit-moto-" + count_moto;

        var html4 = '<div class="form-group input-dinamis m-20 mt-2" id="' + divIdMoto + '">' +
            '<div class="row">' +
            '<div class="col-input-dinamis col-lg-10 ">' +
            '<input type="text" name="url_files_moto[]" class="form-control border-grey" ' +
            'id="' + elementIdMoto + '" onchange="" ' +
            'placeholder="Moto (ex: Juare,Unggul,Amanah,Ramah,Excellent)" required>' +
            '</div>' +
            '<div class="col-input-dinamis col-lg-2">' +
            '<button class="btn btn-danger remove-edit" ' +
            'onclick="removeFileMoto(' + "'" + divIdMoto + "'" + ')" type="button">' +
            'Hapus' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#show-file-list-motos-' + $row_id_konfig).append(html4);
        count_moto++;
    }



    function deleteFileKonfig($tembusan_y, $key, $id_konfig) {
        //alert($key);
        var tembusan_y = $tembusan_y;
        var key = $key;
        var id_konfig = $id_konfig;
        //alert($id_berita);
        // $path = nama file;
        // $file_id = index file dari record db;
        // $row_id= id unique;
        // confirm("Hapus File?",);
        if (confirm("Hapus Tembusan ? ") == true) {
            //alert("confirmed");
            $.ajax({
                type: 'POST',
                url: '/konfigberita/editkonfig/hapustembusan_y',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id_konfig: $id_konfig,
                    key: $key,
                    tembusan_y: $tembusan_y,
                },
                success: function (respond) {
                    console.log(respond);
                    // $("#list-file-"+key+"-"+id_berita).remove();
                }
            });
        }

        // alert("tesss");

    }

    function deleteFileHash($hash, $key, $id_konfig) {
        //alert($key);
        var hash = $hash;
        var key = $key;
        var id_konfig = $id_konfig;

        Swal.fire({
            title: "Apakah Anda Yakin Data Ini Mau Di Hapus?",
            text: "Jika Ya Maka Data Akan Terhapus Permanent",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Saja!",
            cancelButtonText: "Batalkan Saja",
        }).then((result) => {
            if (result.isConfirmed) {
                // form.submit();
                $.ajax({
                    type: 'POST',
                    url: '/konfigberita/editkonfig/hapushash',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_konfig: id_konfig,
                        key: key,
                        hash: hash,
                    },
                    success: function (respond) {
                        console.log(respond);
                        $("#list-file-hashtag-" + key + "-" + id_konfig).remove();
                        //location.reload();
                        //window.top.location = window.top.location
                    }
                });
                Swal.fire({
                    title: "Deleted!",
                    text: "Data Berhasil Dihapus",
                    icon: "success"
                });
            }
        });


        // alert("tesss");

    }
    function deleteFileTembusan($tembusan_y, $key, $id_konfig) {
        //alert($key);
        var tembusan_y = $tembusan_y;
        var key = $key;
        var id_konfig = $id_konfig;

        Swal.fire({
            title: "Apakah Anda Yakin Data Ini Mau Di Hapus?",
            text: "Jika Ya Maka Data Akan Terhapus Permanent",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Saja!",
            cancelButtonText: "Batalkan Saja",
        }).then((result) => {
            if (result.isConfirmed) {
                // form.submit();
                $.ajax({
                    type: 'POST',
                    url: '/konfigberita/editkonfig/hapustembusan_y_rekap',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_konfig: id_konfig,
                        key: key,
                        tembusan_y: tembusan_y,
                    },
                    success: function (respond) {
                        console.log(respond);
                        $("#list-file-yth-" + key + "-" + id_konfig).remove();
                        //location.reload();
                        //window.top.location = window.top.location
                    }
                });
                Swal.fire({
                    title: "Deleted!",
                    text: "Data Berhasil Dihapus",
                    icon: "success"
                });
            }
        });

    }

    function deleteFileMoto($moto, $key, $id_konfig) {
        //alert($key);
        var moto = $moto;
        var key = $key;
        var id_konfig = $id_konfig;

        Swal.fire({
            title: "Apakah Anda Yakin Data Ini Mau Di Hapus?",
            text: "Jika Ya Maka Data Akan Terhapus Permanent",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Saja!",
            cancelButtonText: "Batalkan Saja",
        }).then((result) => {
            if (result.isConfirmed) {
                // form.submit();
                $.ajax({
                    type: 'POST',
                    url: '/konfigberita/editkonfig/hapusmoto',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_konfig: id_konfig,
                        key: key,
                        moto: moto,
                    },
                    success: function (respond) {
                        console.log(respond);
                        $("#list-file-moto-" + key + "-" + id_konfig).remove();
                        //location.reload();
                        //window.top.location = window.top.location
                    }
                });
                Swal.fire({
                    title: "Deleted!",
                    text: "Data Berhasil Dihapus",
                    icon: "success"
                });
            }
        });


        // alert("tesss");

    }

    function deleteFileNasional($link_nasional, $key_nasional, $id_berita) {
        var link_nasional = $link_nasional;
        var key_nasional = $key_nasional;
        var id_berita = $id_berita;

        if (confirm("Hapus Link Berita Nasional?") == true) {
            $.ajax({
                type: 'POST',
                url: '/datasatker/editberita/hapuslink_nasional',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id_berita_nasional: $id_berita,
                    key_nasional: $key_nasional,
                    link_nasional: $link_nasional,
                },
                success: function (respond) {
                    console.log(respond);

                },
            });
        }
    }


</script>
<script>
    $(function () {

        var max_fields_moto = 100;
        var max_fields_nasional = 100;

        var add_button_edit_moto = $(".add_field_button_edit_moto");
        var add_button_edit_nasional = $(".add_field_button_edit_nasional");

        var wrapper_edit_moto = $(".input_fields_wrap_edit_moto");
        var wrapper_edit_nasional = $(".input_fields_wrap_edit_nasional");

        var x_moto = 1;
        var x_nasional = 1;

        $(add_button_edit_moto).click(function (e) {
            e.preventDefault();
            // alert("tes");
            if (x_moto < max_fields_moto) { //max input box allowed
                x++; //text box increment

                $(wrapper_edit_moto).append('<div>' +
                    '<table class="m-l-15 col-lg-12" style="">' +
                    '<tr style="margin-top: 10px">' +
                    '<td>' +


                    '</td>' +
                    '<td style=""><input type="text" name="jumlah_edit_moto[]" class="form-control"  placeholder="Moto" >' +
                    '</td>' +
                    '</tr>' +
                    '</table>' +
                    '<a href="#" style="margin-left: 10px; margin-top:5px; margin-bottom: 5px;" class="remove_field_edit_moto"><i class="fa fa-trash btn btn-danger">Remove</i></a></div>');
                $('.myselect').select2();
            }
        });

        $(wrapper_edit_moto).on("click", ".remove_field_edit_moto", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x_moto--;
        });

        $(add_button_edit_nasional).click(function (e) {
            e.preventDefault();
            // alert("tes");
            if (x_nasional < max_fields) { //max input box allowed
                x_nasional++; //text box increment

                $(wrapper_edit_nasional).append('<div>' +
                    '<table class="m-l-15 col-lg-12" style="">' +
                    '<tr style="margin-top: 10px">' +
                    '<td>' +


                    '</td>' +
                    '<td style=""><input type="text" name="jumlah_edit_nasional[]" class="form-control"  placeholder="Link Media Nasional" >' +
                    '</td>' +
                    '</tr>' +
                    '</table>' +
                    '<a href="#" style="margin-left: 10px;" class="remove_field_edit_nasional"><i class="fa fa-trash btn btn-danger">Remove</i></a></div>');
                $('.myselect').select2();
            }
        });


        $(wrapper_edit_nasional).on("click", ".remove_field_edit_nasional", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>