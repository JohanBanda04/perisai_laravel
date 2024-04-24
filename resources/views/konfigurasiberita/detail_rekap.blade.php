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
                           href="{{ $datakonfig->kode_satker }}"
                           target="">

                            {{ $datakonfig->name }} ( {{ $datakonfig->kode_satker }} )
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Nama Konfigurasi</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->name_config }}"
                           target="">

                            {{ $datakonfig->name_config }}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Salam Pembuka</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->salam_pembuka }}" target="">
                            {{ $datakonfig->salam_pembuka }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Yang Terhormat (Yth)</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->yth }}" target="">
                            {{ $datakonfig->yth }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div>Dari</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->dari_pengirim }}" target="">
                            {{ $datakonfig->dari_pengirim }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Tembusah Yth</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;  ">
                    <div class="row m-l-1" style=" overflow: auto;  ">
                        @php
                            $tembusan_yth = json_decode($datakonfig->jumlah_tembusan_yth)
                        @endphp
                        @foreach($tembusan_yth??[] as $key=>$tembusan)
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1"><i>{{ $key+1 }}</i></div>
                                        <div class="col-11">
                                            <a class="" target="_blank" style="text-decoration: none; overflow: auto"
                                               href="{{ $tembusan }}">
                                                {{ $tembusan }}
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
            <div>Pengantar</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->pengantar }}" target="">
                            {{ $datakonfig->pengantar }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Salam Penutup</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->salam_penutup }}" target="">
                            {{ $datakonfig->salam_penutup }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Ttd Kakanwil</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->ttd_kakanwil }}" target="">
                            {{ $datakonfig->ttd_kakanwil }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Nama Kakanwil</div>
            <div class="input-icon mb-3">
                <div class="form-group col-lg-12"
                     style="justify-items: end;">
                    <div class="row m-1-1" style=" overflow: auto; ">
                        <a class="col-12" style="text-decoration: none"
                           href="{{ $datakonfig->nama_kakanwil }}" target="">
                            {{ $datakonfig->nama_kakanwil }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>