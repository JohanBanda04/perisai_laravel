<div class="container" id="id_berita" name="id_berita" id_berita="">
    <div class="card mt-1">
        <form id="frmGenereteWaTodayKanwil" name="frmGenereteWaTodayKanwil"
              class="" sizeBerita="{{ $sizeBerita }}" kode_satker_value="{{ $kode_satker_value }}"
              action="/datasatker/whatssapgenerate_message_today_kanwil" method="post">
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
                        <select name="id_konfig" id="id_konfig" class="id_konfig_satker form-control">
                            <option value="">-Pilih Konfigurasi Laporan-</option>
                            @foreach($datakonfig as $key=>$d)
                                <option value="{{ $d->id_konfig }}">{{ $d->name_config }}
                                </option>
                            @endforeach

                        </select>

                        {{--NUMPANG--}}
                        <input type="hidden" name="sizeBerita" value="{{ $sizeBerita }}">
                        <input type="hidden" name="kode_satker_value" value="{{ $kode_satker_value }}">

                    </div>
                </div>
            </div>
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
                        <select name="kode_satker_pilihan" id="kode_satker_pilihan"
                                class="{{--id_konfig_satker--}} form-control">
                            <option value="">-Pilih Satker-</option>
                            <option value="all">SEMUA SATKER</option>
                            @foreach($dtsatker as $key=>$d)
                                <option value="{{ $d->kode_satker }}">{{ $d->name }} ( {{ $d->kode_satker }} )
                                </option>
                            @endforeach

                        </select>
                        {{--<input type="hidden" name="kode_satker" value="{{ $kode_satker_value }}">--}}

                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-primary w-100"
                               value="Download (.docx) Laporan Whatssappp">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function () {
        /*javascript ini kepake*/
        /*cara temukan id berdasarkan nama form*/
        $('#frmGenereteWaTodayKanwil').submit(function () {
            var sizeBerita = $(this).attr('sizeBerita');

            var kode_satker_value = $(this).attr('kode_satker_value');
            var id_konfig = $('#frmGenereteWaTodayKanwil').find('#id_konfig').val();
            var kode_satker_pilihan = $('#frmGenereteWaTodayKanwil').find('#kode_satker_pilihan').val();
            //alert(kode_satker_pilihan+'tes');
            //return false;

            if (id_konfig == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Pilihan Konfigurasi Belum Dipilih',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#id_konfig').focus();
                });
                return false;
            } else if (kode_satker_pilihan == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Anda Belum Memilih Satker',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#kode_satker_pilihan').focus();
                });
                return false;
            }

        });

    });
</script>