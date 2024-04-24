<div class="row" id="id_berita" name="id_berita" id_berita="{{ $databerita->id_berita }}">

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
                <select name="id_konfig" id="id_konfig" class="id_konfig_satker form-control">
                    <option value="">-Pilih Konfigurasi Berita-</option>
                    @foreach($datakonfig as $key=>$d)
                        <option value="{{ $d->id_konfig }}">{{ $d->name_config }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <a class="tampilkanlaporan_whatssap_message btn btn-primary w-100" kode_satker="{{ $kode_satker }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-send" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 14l11 -11"/>
                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"/>
                    </svg>
                    {{--ASLIII--}}
                    Generate Laporan Whatsapp
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-tampilkandetail_whatssap_message" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div hidden class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadedittampilkandetail_whatssap_message">

            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.tampilkanlaporan_whatssap_message').click(function () {

            var kode_satker = $(this).attr('kode_satker');
            var e = document.getElementById("id_konfig");
            var e_berita = document.getElementById("id_berita");
            var id_konfig = e.value;
            var id_berita = e_berita.getAttribute("id_berita");

            var text = e.options[e.selectedIndex].text;
            console.log(id_berita);

            if (id_konfig == "") {
                //alert("NIK Harus Diisi");
                Swal.fire({
                    title: 'Warning!',
                    text: 'Anda Belum Memilih Konfigurasi',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#id_konfig').focus();
                });
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '/datasatker/whatssapgenerate_message',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    id_berita: id_berita,
                    id_konfig: id_konfig,
                    kode_satker: kode_satker,
                },
                success: function(respond){
                    console.log(respond);
                    $('#loadedittampilkandetail_whatssap_message').html(respond);
                }
            });

            $('#modal-tampilkandetail_whatssap_message').modal('show');
        });
    });
</script>
