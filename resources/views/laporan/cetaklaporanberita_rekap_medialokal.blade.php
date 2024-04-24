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

        @media print {
            @page {
                size: A4 ; /* DIN A4 standard, Europe */
                margin: 0;
            }

            html, body {
                width: 210mm;
                /* height: 297mm; */
                height: 282mm;
                font-size: 11px;
                background: #FFF;
                overflow: visible;
            }

            body {
                padding-top: 15mm;
            }
        }


    </style>
    <style>@page {
            size: A4 ;
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
<body class="A4">


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
                    REKAPITULASI PUBLIKASI MEDIA LOKAL KEMENKUMHAM NTB  <br>
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

    <table class="tabelpresensi " style="border-spacing: 0px;
            table-layout: fixed;
            margin-left: auto;
            margin-right: auto;">
        <tr>
            <th rowspan="1" style="width: 20px">No.</th>
            <th rowspan="1" colspan="3">Satuan Kerja</th>
            <th rowspan="1" colspan="3" style="width: max-content">Link Media Lokal</th>

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
        @php
            $total_medlokal_perberita_akhir= 0;
        @endphp
        @foreach($satkers as $key=>$satker)
            @if($satker->roles!='superadmin')
                @php
                    $beritas = DB::table('berita')->where('kode_satker', $satker->kode_satker)->get();
                @endphp
                @php
                    $total_medlokal_perberita = 0;
                @endphp
                @foreach($beritas as $id=>$berita)
                    @php
                        $link_medlokal_perberita = json_decode($berita->media_lokal);
                        $count_medlokal_perberita = count($link_medlokal_perberita);
                        $total_medlokal_perberita += $count_medlokal_perberita;
                    @endphp
                @endforeach
                @php
                    $total_medlokal_perberita_akhir +=$total_medlokal_perberita;
                @endphp
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td colspan="3">{{ $satker->name }}</td>
                    <td align="center" colspan="3">{{ $total_medlokal_perberita }}</td>
                </tr>
            @endif
        @endforeach
        <tr style="background: rgba(205,178,184,0.43); font-weight: bold">
            <td colspan="4" align="center">Jumlah</td>
            <td colspan="3" align="center">{{ $total_medlokal_perberita_akhir }}</td>
        </tr>
        {{--<tr style="background: #b1ccdf">--}}
        {{--<td colspan="2" align="center" style="font-weight: bold; font-size: 15px;">Jumlah</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $website_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $facebook_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $instagram_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $twitter_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $tiktok_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $sippn_tot_akhir }}</td>--}}
        {{--<td align="center" style="font-weight: bold; font-size: 15px;">{{ $youtube_tot_akhir }}</td>--}}
        {{--</tr>--}}

    </table>

    <table width="100%" style="margin-top: 100px">
        <tr>
            <td colspan="2" style="color: white;text-align: right; padding-right: 230px;">
                Mataram, {{ date('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="color: white;text-align: center; vertical-align: bottom" height="100px">
                <u>Qiana Kalila</u><br>
                <i><b>HRD Manager</b></i>
            </td>
            <td style="color: white;text-align: center; vertical-align: bottom; padding-right: 18px;">
                <u>Ttd Operator</u><br>
                <i><b>{{ auth()->user()->name }}</b></i>
            </td>
        </tr>
    </table>
</section>

</body>

</html>