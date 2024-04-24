<div class="row">
    <div class="col-12">
        <div hidden class="col-3 mb-3" style="margin-left: 0px">

            <button href="#" class="btn btn-warning" id="btnTambahBeritaSatker">
                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"/>
                    <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"/>
                </svg>
                {{--ASLIII--}}
                Copy
            </button>
        </div>
        <div class="input-icon mb-3">
            <span style="font-weight: bold">{{ $dtKonfig->salam_pembuka }}</span> <br><br>
            <span style="font-weight: bold">{{ $dtKonfig->yth }}</span> <br><br>

            <span style="font-weight: bold">Tembusan Yth:</span><br>
            @php
                $dtTembusans = json_decode($dtKonfig->jumlah_tembusan_yth);
            @endphp
            @if(($dtTembusans) != "")
                @foreach($dtTembusans as $keyTembus=>$dtTembus)
                    <span>{{ $keyTembus+1 }} {{ $dtTembus }}</span><br>
                @endforeach
            @elseif($dtTembusans == "")
                <span>-</span><br>
            @endif
            <br>

            <span>Dari : </span>
            <span>{{ $dtKonfig->dari_pengirim }}</span><br><br>
            <span>{{ $dtKonfig->pengantar }}</span><br><br>
            <span style="font-weight: bold">Judul : {{ $dtBerita->nama_berita }}</span><br><br>



            <span style="font-weight: bold">Berita Selengkapnya bisa dilihat pada halaman berikut :</span><br><br>
            <span style="font-weight: bold">Link Website</span><br>
            <span class="" style="">
                {{ $dtBerita->website!="" ?$dtBerita->website:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link Facebook</span><br>
            <span class="" style="">
                {{ $dtBerita->facebook!="" ?$dtBerita->facebook:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link Instagram</span><br>
            <span class="" style="">
                {{ $dtBerita->instagram!="" ?$dtBerita->instagram:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link Twitter</span><br>
            <span class="" style="">
                {{ $dtBerita->twitter!="" ?$dtBerita->twitter:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link Tiktok</span><br>
            <span class="" style="">
                {{ $dtBerita->tiktok!="" ?$dtBerita->tiktok:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link SIPPN</span><br>
            <span class="" style="">
                {{ $dtBerita->sippn!="" ?$dtBerita->sippn:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Link Youtube</span><br>
            <span class="" style="">
                {{ $dtBerita->youtube!="" ?$dtBerita->youtube:"-" }}
            </span><br><br>

            <span style="font-weight: bold">Media Lokal</span><br>
            @php
                $dtMedlok = json_decode($dtBerita->media_lokal);
            @endphp
            @if(($dtMedlok) != "")
                @foreach($dtMedlok as $key=>$dtMed)
                    <span>{{ $key+1 }} {{ $dtMed }}</span><br>
                @endforeach
            @elseif($dtMedlok == "")
                <span>-</span>
            @endif
            <br>

            <span style="font-weight: bold">Media Nasional</span><br>
            @php
                $dtMedNas = json_decode($dtBerita->media_nasional);
            @endphp
            @if(($dtMedNas) != "")
                @foreach($dtMedNas as $key=>$dtNas)
                    <span>{{ $key+1 }} {{ $dtNas }}</span><br>
                @endforeach
            @elseif($dtMedNas == "")
                <span>-</span>
            @endif
            <br>


            @php
                $dtHash = json_decode($dtKonfig->jumlah_hashtag);
            @endphp
            @if($dtHash != "")
                @foreach($dtHash as $keyHash=>$dth)
                    <span>{{ $dth }}</span><br>
                @endforeach
            @elseif($dtHash == "")
                <span></span><br>
            @endif
            <br>

            @php
                $dtMotos = json_decode($dtKonfig->jumlah_moto);
            @endphp
            @if($dtMotos != "")
                @foreach($dtMotos as $keyMoto=>$dtm)
                    <span>{{ $dtm }}</span><br>
                @endforeach
            @elseif($dtMotos == "")
                <span></span><br>
            @endif
            <br>

            {{--JARGON--}}
            <span class="" style="font-style: italic; font-weight: bold">
                {{ $dtKonfig->jargon!="" ?$dtKonfig->jargon:" " }}
            </span><br><br>

            {{--PENUTUP--}}
            <span class="" style="font-style: italic; font-weight: bold">
                {{ $dtKonfig->penutup!="" ?$dtKonfig->penutup:" " }}
            </span><br><br>

            {{--SALAM PENUTUP--}}
            <span class="" style="font-style: italic; font-weight: bold">
                {{ $dtKonfig->salam_penutup!="" ?$dtKonfig->salam_penutup:" " }}
            </span><br><br>


        </div>
    </div>
</div>
<script>
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    });
</script>
@push('myscript')
    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        });
    </script>
@endpush

