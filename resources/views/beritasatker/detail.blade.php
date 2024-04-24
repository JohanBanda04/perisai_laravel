<form action="#" id="frmDetailBerita" name="frmDetailBerita" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div>Kode Satker</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $databerita->kode_satker }}"
                           target="">

                            {{ $databerita->kode_satker }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Judul Berita</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->nama_berita }}"
                           target="">

                            {{ $databerita->nama_berita }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Facebook</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->facebook }}"
                           target="">

                            {{ $databerita->facebook }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Website</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->website }}"
                           target="">

                            {{ $databerita->website }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Instagram</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->instagram }}"
                           target="">

                            {{ $databerita->instagram }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Twitter</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->twitter }}"
                           target="">

                            {{ $databerita->twitter }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Tiktok</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->tiktok }}"
                           target="">

                            {{ $databerita->tiktok }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link SIPPN</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->sippn }}"
                           target="">

                            {{ $databerita->sippn }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Link Youtube</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" target="_blank" style="text-decoration: none"
                           href="{{ $databerita->youtube }}"
                           target="">

                            {{ $databerita->youtube }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <center>
                <div>Link Tambahan (Media Lokal)</div>
            </center>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <?php
                        $links_media_lokal = json_decode($databerita->media_lokal);
                        ?>

                        @foreach($links_media_lokal as $key=>$media_lokal)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-1"><i>{{ $key+1 }}</i></div>
                                        <div class="col-11">
                                            <a class="" target="_blank" style="text-decoration: none; overflow: auto"
                                               href="{{ $media_lokal }}">

                                                {{ $media_lokal }}
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        @endforeach

                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <center>
                <div>Link Tambahan (Media Nasional)</div>
            </center>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <?php
                        $links_media_nasional = json_decode($databerita->media_nasional);
                        ?>

                        @foreach($links_media_nasional as $key=>$media_nasional)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-1"><i>{{ $key+1 }}</i></div>
                                        <div class="col-11">
                                            <a class="" target="_blank" style="text-decoration: none; overflow: auto"
                                               href="{{ $media_nasional }}"
                                               target="">

                                                {{ $media_nasional }}
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


            </div>
        </div>
    </div>


</form>