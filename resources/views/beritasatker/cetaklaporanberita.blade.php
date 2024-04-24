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
        .tdcolor {
            background: #cccaca;
            font-weight: bold;
            font-size: 20px;
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
            <td colspan="9">
                <span id="title">
                    <center>REKAPITULASI PUBLIKASI MEDIA SOSIAL {{ strtoupper($satker_name) }}</center>
                    <br>
                    <center>PERIODE {{ $tgl_dari }} {{ strtoupper($namabulan[$bulan_dari]) }} {{ $tahun_dari }} s.d. {{ $tgl_sampai }} {{ strtoupper($namabulan[$bulan_sampai]) }} {{ $tahun_sampai }}</center>
                </span>
            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">
        <tr>
            <td rowspan="">
                @php
                    /*$path = Storage::url('uploads/karyawan/'.$karyawan->foto);*/
                @endphp
                {{--<img src="{{ url($path) }}" alt="" width="120px" height="150px">--}}
            </td>
        </tr>


    </table>
    <table class="tabelpresensi">
        <tr>
            <th style="width: 10px">No.</th>
            <th>Tanggal</th>
            <th>Website</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>Tiktok</th>
            <th>SIPPN</th>
            <th>Youtube</th>
        </tr>
        @foreach($getberita as $d)
            @php
                /*$path_in = Storage::url('uploads/absensi/'.$d->foto_in);
                $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
                $jamterlambat = selisih('07:00:00',$d->jam_in);*/
            @endphp
            <tr>
                <td style="width: 10px" align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ date("d-m-Y",strtotime($d->tgl_input)) }}</td>
                <td>{{ $d->website }}</td>
                <td>{{ $d->facebook }}</td>
                <td>{{ $d->instagram }}</td>
                <td>{{ $d->twitter }}</td>
                <td>{{ $d->tiktok }}</td>
                <td>{{ $d->sippn }}</td>
                <td>{{ $d->youtube }}</td>

            </tr>
        @endforeach
        <tr class="tdcolor">
            <td align="center" colspan="2">
                Jumlah
            </td>

            <td align="center" style="font-weight: bold">{{ $total_website[0]->jml_website }}</td>
            <td align="center" style="font-weight: bold">{{ $total_facebook[0]->jml_facebook }}</td>
            <td align="center" style="font-weight: bold">{{ $total_instagram[0]->jml_instagram }}</td>
            <td align="center" style="font-weight: bold">{{ $total_twitter[0]->jml_twitter }}</td>
            <td align="center" style="font-weight: bold">{{ $total_tiktok[0]->jml_tiktok }}</td>
            <td align="center" style="font-weight: bold">{{ $total_sippn[0]->jml_sippn }}</td>
            <td align="center" style="font-weight: bold">{{ $total_youtube[0]->jml_youtube }}</td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 100px">
        <tr style="color: white;">
            <td colspan="2" style="text-align: right;">Mataram, {{ date('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="color: white;text-align: center; vertical-align: bottom" height="100px" >
                <u>Qiana Kalila</u><br>
                <i><b>HRD Manager</b></i>
            </td>
            <td style="color: white;text-align: center; vertical-align: bottom"  >
                <u>Dafa</u><br>
                <i><b>Direktur</b></i>
            </td>
        </tr>
    </table>
</section>

</body>

</html>