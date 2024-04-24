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


<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <table style="width: 100%">
        <tr>
            <td colspan="11">
                <span id="title">
                    <center>REKAPITULASI PUBLIKASI MEDIA LOKAL {{ strtoupper($satker_name) }}</center>
                    <br>
                    <center>PERIODE {{ $tgl_dari }} {{ strtoupper($namabulan[$bulan_dari]) }} {{ $tahun_dari }}
                        s.d. {{ $tgl_sampai }} {{ strtoupper($namabulan[$bulan_sampai]) }} {{ $tahun_sampai }}</center>
                </span>
            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">
        <tr>
            <td rowspan="">

            </td>
        </tr>


    </table>
    <table class="tabelpresensi">
        {{--<tr >--}}
        {{--<th style="width: 10px">No.</th>--}}
        {{--<th>Tanggal</th>--}}
        {{--<th>Website</th>--}}
        {{--<th>Facebook</th>--}}
        {{--<th>Instagram</th>--}}
        {{--<th>Twitter</th>--}}
        {{--<th>Tiktok</th>--}}
        {{--<th>SIPPN</th>--}}
        {{--<th>Youtube</th>--}}
        {{--</tr>--}}
        @foreach($getberita as $key=>$d)
            <tr>
                <td colspan="11" style="font-size: 20px; font-weight: bold;
                border-right: none; border-left: none; border-top: none; border-bottom: none">
                    <center>{{ ucwords($d->nama_berita) }}</center>
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Tanggal</th>
                <th style="width: max-content" colspan="10">Link Media Lokal</th>
            </tr>
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
                    $tahun = $exp_tgl_input[0];
                    @endphp
                    <td style="width: 20%"><b>{{ $loop->iteration }}</b>. {{ $tgl }} {{ $namabulan[$bulan] }} {{ $tahun }}
                    </td>
                    <td colspan="10">{{ $link_lokal }}</td>
                </tr>
            @endforeach
            <tr class="tdcolor">
                @php
                    $links_media_lokal = json_decode($d->media_lokal);
                @endphp
                <td align="center" valign="center" style="font-weight: bold; font-size: 15px; background: #eceaea; ">Jumlah</td>
                <td colspan="10" align="center" valign="center" style="font-weight: bold; font-size: 15px; background: #eceaea">{{ count($links_media_lokal) }}</td>
            </tr>
        @endforeach
        {{--@foreach($getberita as $d)
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
        <tr>
            <td style="background: #cccaca; font-weight: bold; font-size: 20px" align="center" colspan="2">
                Jumlah
            </td>

            <td align="center" style="font-weight: bold">{{ $total_website[0]->jml_website }}</td>
            <td align="center" style="font-weight: bold">{{ $total_facebook[0]->jml_facebook }}</td>
            <td align="center" style="font-weight: bold">{{ $total_instagram[0]->jml_instagram }}</td>
            <td align="center" style="font-weight: bold">{{ $total_twitter[0]->jml_twitter }}</td>
            <td align="center" style="font-weight: bold">{{ $total_tiktok[0]->jml_tiktok }}</td>
            <td align="center" style="font-weight: bold">{{ $total_sippn[0]->jml_sippn }}</td>
            <td align="center" style="font-weight: bold">{{ $total_youtube[0]->jml_youtube }}</td>
        </tr>--}}
    </table>
    <table width="100%" style="margin-top: 100px">
        <tr style="color: white;">
            <td colspan="2" style="text-align: right;">Mataram, {{ date('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="color: white;text-align: center; vertical-align: bottom" height="100px">
                <u>Qiana Kalila</u><br>
                <i><b>HRD Manager</b></i>
            </td>
            <td style="color: white;text-align: center; vertical-align: bottom">
                <u>Dafa</u><br>
                <i><b>Direktur</b></i>
            </td>
        </tr>
    </table>
</section>

</body>

</html>