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
<body class="A4 ">


<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <table style="width: 100%">
        <tr>

            <td colspan="10">
                <span id="title">
                    <center>REKAPITULASI PUBLIKASI MEDIA NASIONAL KEMENKUMHAM NTB</center>
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
            <th rowspan="1" style="width: 10px">No.</th>
            <th rowspan="1" colspan="2">Satuan Kerja</th>
            <th rowspan="1" colspan="7">Link Media Nasional</th>

        </tr>

        @php
            $total_mednasional_perberita_akhir= 0;
        @endphp
        @foreach($satkers as $key=>$satker)
            @if($satker->roles !='superadmin' )
                @php
                    $beritas = DB::table('berita')->where('kode_satker', $satker->kode_satker)->get();
                @endphp
                @php
                    $total_mednasional_perberita = 0;
                @endphp
                @foreach($beritas as $id=>$berita)
                    @php
                        $link_mednasional_perberita = json_decode($berita->media_nasional);
                        $count_mednasional_perberita = count($link_mednasional_perberita);
                        $total_mednasional_perberita += $count_mednasional_perberita;
                    @endphp
                @endforeach
                @php
                    $total_mednasional_perberita_akhir +=$total_mednasional_perberita;
                @endphp
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td align="left" colspan="2">{{ $satker->name }}</td>
                    <td align="center" colspan="7">{{ $total_mednasional_perberita }}</td>
                </tr>
            @endif
        @endforeach
        <tr style="background: rgba(205,178,184,0.43); font-weight: bold">
            <td colspan="3" align="center">Jumlah</td>
            <td colspan="7" align="center">{{ $total_mednasional_perberita_akhir }}</td>
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