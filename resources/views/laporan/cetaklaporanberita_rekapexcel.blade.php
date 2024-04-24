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

            <td colspan="10">
                <span id="title">
                    <center>REKAPITULASI PUBLIKASI MEDIA SOSIAL KEMENKUMHAM NTB</center>
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
        <tr>
            <th rowspan="2" style="width: 10px">No.</th>
            <th rowspan="2" colspan="2">Satuan Kerja</th>
            <th rowspan="1" colspan="7">Media Sosial Official</th>

        </tr>
        <tr>
            <th>Website</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>Tiktok</th>
            <th>SIPPN</th>
            <th>Youtube</th>
        </tr>
        <?php
        $website_tot_akhir = 0;
        $facebook_tot_akhir = 0;
        $instagram_tot_akhir = 0;
        $twitter_tot_akhir = 0;
        $tiktok_tot_akhir = 0;
        $sippn_tot_akhir = 0;
        $youtube_tot_akhir = 0;
        ?>
        @foreach($satkers as $key=>$satker)
            @if($satker->roles!='superadmin')
                @php
                    $total_website = DB::select(DB::raw("SELECT count(website) as jml_website from berita
                        where kode_satker='$satker->kode_satker' and website!='' AND tgl_input between '$dari' and '$sampai'"));

                $total_facebook = DB::select(DB::raw("SELECT count(facebook) as jml_facebook from berita
                    where kode_satker='$satker->kode_satker' and facebook!='' AND tgl_input between '$dari' and '$sampai'"));

                    $total_instagram = DB::select(DB::raw("SELECT count(instagram) as jml_instagram from berita
                    where kode_satker='$satker->kode_satker' and instagram!='' AND tgl_input between '$dari' and '$sampai'"));

                $total_twitter = DB::select(DB::raw("SELECT count(twitter) as jml_twitter from berita
                    where kode_satker='$satker->kode_satker' and twitter!='' AND tgl_input between '$dari' and '$sampai'"));
                $total_tiktok = DB::select(DB::raw("SELECT count(tiktok) as jml_tiktok from berita
                    where kode_satker='$satker->kode_satker' and tiktok!='' AND tgl_input between '$dari' and '$sampai'"));
                $total_sippn = DB::select(DB::raw("SELECT count(sippn) as jml_sippn from berita
                    where kode_satker='$satker->kode_satker' and sippn!='' AND tgl_input between '$dari' and '$sampai'"));
                $total_youtube = DB::select(DB::raw("SELECT count(youtube) as jml_youtube from berita
                    where kode_satker='$satker->kode_satker' and youtube!='' AND tgl_input between '$dari' and '$sampai'"));
                @endphp
                <tr>
                    @php
                        $website_tot_akhir += $total_website[0]->jml_website;
                        $facebook_tot_akhir += $total_facebook[0]->jml_facebook;
                        $instagram_tot_akhir += $total_instagram[0]->jml_instagram;
                        $twitter_tot_akhir += $total_twitter[0]->jml_twitter;
                        $tiktok_tot_akhir += $total_tiktok[0]->jml_tiktok;
                        $sippn_tot_akhir += $total_sippn[0]->jml_sippn;
                        $youtube_tot_akhir += $total_youtube[0]->jml_youtube;
                    @endphp
                    <td align="center">{{ $loop->iteration }}</td>
                    <td colspan="2" align="left">{{ $satker->name }}</td>
                    <td align="center">{{ $total_website[0]->jml_website }}</td>
                    <td align="center">{{ $total_facebook[0]->jml_facebook }}</td>
                    <td align="center">{{ $total_instagram[0]->jml_instagram }}</td>
                    <td align="center">{{ $total_twitter[0]->jml_twitter }}</td>
                    <td align="center">{{ $total_tiktok[0]->jml_tiktok }}</td>
                    <td align="center">{{ $total_sippn[0]->jml_sippn }}</td>
                    <td align="center">{{ $total_youtube[0]->jml_youtube }}</td>
                </tr>
            @endif
        @endforeach
        <tr style="background: #b1ccdf">
            <td colspan="3" align="center" style="font-weight: bold; font-size: 15px;">Jumlah</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $website_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $facebook_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $instagram_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $twitter_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $tiktok_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $sippn_tot_akhir }}</td>
            <td align="center" style="font-weight: bold; font-size: 15px;">{{ $youtube_tot_akhir }}</td>
        </tr>


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