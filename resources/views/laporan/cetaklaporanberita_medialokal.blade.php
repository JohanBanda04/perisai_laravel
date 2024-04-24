<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A4</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        .overflowtes td {
            border: 1px solid black;
            word-wrap: break-word;
        }
        .sheet {
            overflow: visible;
            height: auto !important;
        }
    </style>
    <style>@page {
            size: A4 landscape;
        }

        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        .tabeldatakaryawan {
            margin-top: 40px;
        }

        .tabeldatakaryawan tr td {
            padding: 5px;
        }

        .tabelpresensi {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .tabelpresensi tr th {
            border: 1px solid #000000;
            padding: 8px;
            background: #cccaca;
        }

        .tabelpresensi tr td {
            border: 1px solid #000000;
            padding: 5px;
            font-size: 12px;
        }

        .foto {
            width: 40px;
            height: 30px;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">

@php
    function selisih($jam_masuk, $jam_keluar)
           {
               list($h, $m, $s) = explode(":", $jam_masuk);
               $dtAwal = mktime($h, $m, $s, "1", "1", "1");
               list($h, $m, $s) = explode(":", $jam_keluar);
               $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
               $dtSelisih = $dtAkhir - $dtAwal;
               $totalmenit = $dtSelisih / 60;
               $jam = explode(".", $totalmenit / 60);
               $sisamenit = ($totalmenit / 60) - $jam[0];
               $sisamenit2 = $sisamenit * 60;
               $jml_jam = $jam[0];
               return $jml_jam . ":" . round($sisamenit2);
           }
@endphp

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <table style="width: 100%">
        <tr>
            <td style="width: 30px">
                {{--<img src="{{ asset('assets/img/logopresensi.png') }}" width="70" height="70" alt="">--}}
            </td>
            <td>
                <center>
                    <span id="title">
                    LAPORAN LINK BERITA MEDIA LOKAL {{ $satker_name }} <br>
                    PERIODE {{ $tgl_dari }} {{ strtoupper($namabulan[$bulan_dari]) }} {{ $tahun_dari }}
                        s.d. {{ $tgl_sampai }} {{ strtoupper($namabulan[$bulan_sampai]) }} {{ $tahun_sampai }}
                        <br>
                    <br>
                </span>
                    <span hidden><i>Jl. Majapahit No.44, Kekalik Jaya, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Barat. 83115</i></span>
                </center>

            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">

    </table>
    <table class="tabelpresensi" style="border-spacing: 0px;
            table-layout: fixed;
            margin-left: auto;
            margin-right: auto;">
        <tr hidden>
            <th style="width: 20px">No.</th>
            <th style="width: 50px;">Tanggal</th>
            <th style="width: max-content">Judul Berita</th>

        </tr>
        @php
            //$links_media_lokal = json_decode($berita->media_lokal);
        @endphp
        @foreach($getberita as $d)
            <tr colspan="">
                {{--JUDUL BERITA--}}
                <td colspan="2" style="font-size: 20px; border-right: none; border-left: none; border-top: none">
                    <center>{{ ucwords($d->nama_berita) }}</center>
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Tanggal</th>
                <th style="width: max-content">Link Media Lokal</th>

            </tr>
            <tr class="overflowtes">
                <td hidden style="width: 10px">{{ $loop->iteration }}</td>
                <td hidden style="width: 10px;">{{ date("d-m-Y",strtotime($d->tgl_input)) }}</td>
            @php
                $links_media_lokal = json_decode($d->media_lokal);
            @endphp
            @foreach($links_media_lokal??[] as $key=>$link_lokal)
                <tr class="overflowtes">
                    @php
                        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September",
            "Oktober","November","Desember"];
                    $tgl_input = $d->tgl_input;
                    $exp_tgl_input = explode('-', $tgl_input);
        $tgl = $exp_tgl_input[2];
        $bulan = $exp_tgl_input[1];

        if(substr($bulan,0,1)==0){
            $bulan = substr($bulan,1,1);
        } else if(substr($bulan,0,1)==1){
            $bulan = substr($bulan,0,2);
        }
        //dd($bulan_dari);
        $tahun = $exp_tgl_input[0];
                    @endphp
                    <td style="width: 20%"><b>{{ $loop->iteration }}</b>. {{ $tgl }} {{ $namabulan[$bulan] }} {{ $tahun }}
                    </td>
                    <td>{{ $link_lokal }}</td>

                </tr>
                @endforeach


                </tr>
                <tr>
                    @php
                        $links_media_lokal = json_decode($d->media_lokal);
                    @endphp
                    <td align="center" valign="center" style="font-weight: bold; font-size: 15px; background: #eceaea">Jumlah</td>
                    <td align="center" valign="center" style="font-weight: bold; font-size: 15px; background: #eceaea">{{ count($links_media_lokal) }}</td>
                </tr>

            @endforeach

    </table>
    {{--<table width="100%" style="margin-top: 100px">--}}
        {{--<tr>--}}
            {{--<td colspan="2" style="color: white;text-align: right; padding-right: 230px;">--}}
                {{--Mataram, {{ date('d-m-Y') }}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="color: white;text-align: center; vertical-align: bottom" height="100px">--}}
                {{--<u>Qiana Kalila</u><br>--}}
                {{--<i><b>HRD Manager</b></i>--}}
            {{--</td>--}}
            {{--<td style="color: white;text-align: center; vertical-align: bottom; padding-right: 18px;">--}}
                {{--<u>Ttd Operator</u><br>--}}
                {{--<i><b>{{ auth()->user()->name }}</b></i>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
</section>

</body>

</html>