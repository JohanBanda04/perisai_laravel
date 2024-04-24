<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date('Y-m-d');
        $bulanini = date('m') * 1;
        $tahunini = date('Y');
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini = DB::table('presensi')->where('nik', $nik)->where('tgl_presensi', $hariini)->first();
        $historibulanini = DB::table('presensi')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
            ->orderBy('tgl_presensi')
            ->get();

        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "07:00:00",1,0)) as jmlterlambat')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
            ->first();

        $leaderboard = DB::table('presensi')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->where('tgl_presensi', $hariini)
            ->orderBy('jam_in')
            ->get();

        //dd($rekappresensi);
        $namabulan = [
            "",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_izin)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_izin)="' . $tahunini . '"')
            ->where('status_approved', 1)
            ->first();
        //dd($namabulan[$bulanini]);

        //dd($historibulanini);
        return view('dashboard.dashboard', compact('presensihariini',
            'historibulanini', 'namabulan',
            'bulanini', 'tahunini', 'rekappresensi',
            'leaderboard', 'rekapizin'));
    }

    public function dashboardadmin()
    {
        $hariini = date('Y-m-d');
        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "07:00:00",1,0)) as jmlterlambat')
            ->where('tgl_presensi', $hariini)
            ->first();

        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
            ->where('tgl_izin', $hariini)
            ->where('status_approved', 1)
            ->first();
        return view('dashboard.dashboardadmin', compact('rekappresensi', 'rekapizin'));
    }

    public function dashboardsatker(Request $request)
    {


        //return $request->dari;
        $queryBerita = DB::table('berita');
        $queryKonfig = DB::table('konfigurasi_berita');
        //return $queryGetSatkerAll[0]->name;

        if (auth()->user()->roles != 'superadmin') {
            $queryBerita->where('kode_satker', auth()->user()->kode_satker);
            $queryKonfig->where('kode_satker', auth()->user()->kode_satker);
        }

        /*default sebelum dilakukan filter tanggal untuk admin dari sini*/
        $tgl_dari_default = date('Y-m-d', strtotime('-1 week'));
        $tgl_sampai_default = date('Y-m-d');

        /*langsung intervensi di sini saja untuk tanggal nya bro jo*/
        if (!empty($request->dari) && !empty($request->sampai)) {
            //return $request;
            $tgl_dari_default = $request->dari;
            $tgl_sampai_default = $request->sampai;
        }

        /*24-04-2024 data untuk dashboard humas satker*/

        /*=================*/
        /*23-04-2024 data untuk dashboard humas kanwil*/
        if (auth()->user()->roles == 'humas_kanwil' || auth()->user()->roles=='humas_satker') {
            $data_zonaAll_Kanwil = ['Website', 'Sosial Media', 'Media Lokal', 'Media Nasional'];
            $counter_jenis_publikasi = 0;
            $counter_kanwil = 0;
            $kode_satker_humas_kanwil = auth()->user()->kode_satker;
            $getSatkerByKode = DB::table('satker')->where('kode_satker', $kode_satker_humas_kanwil)->first();
            $explode_role = explode('_', $getSatkerByKode->roles);
            $complete_humas_role = ucfirst($explode_role[0]) . " " . ucfirst($explode_role[1]);
            $completeNameRole = "(" . $getSatkerByKode->name . "-" . $complete_humas_role . ")";

            /*untuk mendapatkan xAxis pada Dashboard Humas Kanwil*/
            foreach ($data_zonaAll_Kanwil as $idx => $val) {
                $nama_zona_publikasi[$counter_jenis_publikasi] = $val;
                $counter_jenis_publikasi++;
            }

            /*untuk mendapatkan total berita pada website humas kanwil*/
            foreach ($data_zonaAll_Kanwil as $idx => $val) {
                if ($val == 'Website') {
                    $tbl_berita_by_publikasi = DB::select(DB::raw("select count(website) as jml_berita from berita
where kode_satker='$kode_satker_humas_kanwil' and website!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));
                    $publikasi_id[$counter_kanwil] = $tbl_berita_by_publikasi[0]->jml_berita;
                }
            }

            $counter_kanwil += 1;
            $publikasi_id[$counter_kanwil] = 0;
            /*untuk mendapatkan total berita pada sosmed humas kanwil*/
            foreach ($data_zonaAll_Kanwil as $idx => $val) {
                if ($val == 'Sosial Media') {
                    $tbl_berita_by_publikasi_facebook = DB::select(DB::raw("select count(facebook) as jml_berita_facebook from berita
where kode_satker='$kode_satker_humas_kanwil' and facebook!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));

                    $tbl_berita_by_publikasi_instagram = DB::select(DB::raw("select count(instagram) as jml_berita_instagram from berita
where kode_satker='$kode_satker_humas_kanwil' and instagram!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));

                    $tbl_berita_by_publikasi_twitter = DB::select(DB::raw("select count(twitter) as jml_berita_twitter from berita
where kode_satker='$kode_satker_humas_kanwil' and twitter!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));

                    $tbl_berita_by_publikasi_tiktok = DB::select(DB::raw("select count(tiktok) as jml_berita_tiktok from berita
where kode_satker='$kode_satker_humas_kanwil' and tiktok!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));

                    $tbl_berita_by_publikasi_youtube = DB::select(DB::raw("select count(youtube) as jml_berita_youtube from berita
where kode_satker='$kode_satker_humas_kanwil' and youtube!='' AND tgl_input between '$tgl_dari_default' and '$tgl_sampai_default'"));

                    $total_link_sosmed = ($tbl_berita_by_publikasi_facebook[0]->jml_berita_facebook)
                        + ($tbl_berita_by_publikasi_instagram[0]->jml_berita_instagram) +
                        ($tbl_berita_by_publikasi_twitter[0]->jml_berita_twitter) +
                        ($tbl_berita_by_publikasi_tiktok[0]->jml_berita_tiktok) +
                        ($tbl_berita_by_publikasi_youtube[0]->jml_berita_youtube);

                    $publikasi_id[$counter_kanwil] = $total_link_sosmed;
                }
            }

            $counter_kanwil += 1;
            $publikasi_id[$counter_kanwil] = 0;
            /*untuk mendapatkan total berita pada media lokal humas kanwil*/
            foreach ($data_zonaAll_Kanwil as $idx => $val) {
                if ($val == 'Media Lokal') {
                    $getberita = DB::table('berita')
                        ->where('kode_satker', $kode_satker_humas_kanwil)
                        ->whereBetween('tgl_input', [$tgl_dari_default, $tgl_sampai_default])
                        ->get();
                    $total_medlok = 0;
                    foreach ($getberita as $id => $dtberita) {
                        $links_media_lokal = json_decode($dtberita->media_lokal);
                        $sum_medlok = count($links_media_lokal);
                        $total_medlok += $sum_medlok;
                    }
                    $publikasi_id[$counter_kanwil] = $total_medlok;
                    //echo $total_medlok;
                    //die;
                }
            }

            $counter_kanwil += 1;
            $publikasi_id[$counter_kanwil] = 0;
            /*untuk mendapatkan total berita pada media nasional humas kanwil*/
            foreach ($data_zonaAll_Kanwil as $idx => $val) {
                if ($val == 'Media Nasional') {
                    $getberita = DB::table('berita')
                        ->where('kode_satker', $kode_satker_humas_kanwil)
                        ->whereBetween('tgl_input', [$tgl_dari_default, $tgl_sampai_default])
                        ->get();
                    $total_mednas = 0;
                    foreach ($getberita as $id => $dtberita) {
                        $links_media_nasional = json_decode($dtberita->media_nasional);
                        $sum_mednas = count($links_media_nasional);
                        $total_mednas += $sum_mednas;
                    }
                    $publikasi_id[$counter_kanwil] = $total_mednas;
                    //echo $total_mednas;
                    //die;

                }
            }

            $tot_kanwil = 0;
            foreach ($publikasi_id as $pid) {
                $tot_kanwil += $pid;
            }
            $zona_publikasi_list_ii_kanwil = $nama_zona_publikasi;
            $realisasi_publikasi_kanwil_total = $publikasi_id;
            $total_kanwil = $tot_kanwil;
        }
        /*==================*/

        /*default data*/
        $queryBeritaGrafikJumlah = DB::select(DB::raw("select count(*) as jml_berita from berita
where tgl_input BETWEEN '$tgl_dari_default' and '$tgl_sampai_default' group by kode_satker"));
        $queryBeritaGrafikKode = DB::select(DB::raw("select kode_satker from berita
where tgl_input BETWEEN '$tgl_dari_default' and '$tgl_sampai_default' group by kode_satker"));

        $counter = 0;
        $total = 0;
        $queryGetSatkerAll = DB::table('satker')->orderBy('kode_satker')->get();

        foreach ($queryGetSatkerAll as $key => $satker) {
            if ($satker->roles != "superadmin") {

                $tbl_berita_by_satker = DB::table('berita')->where('kode_satker', $satker->kode_satker);
                $satker_id[$counter] = $tbl_berita_by_satker->count();

                $explode_humas_role = explode('_', $satker->roles);
                if (isset($explode_humas_role[1])) {
                    //echo "non superadmin";
                    $complete_role = ucfirst($explode_humas_role[0]) . " " . ucfirst($explode_humas_role[1]);
                } else if (!isset($explode_humas_role[1])) {
                    //echo "superadmin";
                    $complete_role = ucfirst($explode_humas_role[0]);
                }
                $nama_satker[$counter] = $satker->name . " (" . $complete_role . ")";
                $total += $tbl_berita_by_satker->count();
                $counter++;
            }
        }


        /*jika superadmin yagesya :*/
        if (!empty($request->dari) && !empty($request->sampai)) {
            //return $request;
            $tgl_dari_default = $request->dari;
            $tgl_sampai_default = $request->sampai;

            //echo $tgl_dari_default."|||".$tgl_sampai_default;

            $queryBeritaGrafikJumlah = DB::select(DB::raw("select count(*) as jml_berita from berita
where tgl_input BETWEEN '$tgl_dari_default' and '$tgl_sampai_default' group by kode_satker"));
            $queryBeritaGrafikKode = DB::select(DB::raw("select kode_satker from berita
where tgl_input BETWEEN '$tgl_dari_default' and '$tgl_sampai_default' group by kode_satker"));


            $counter = 0;
            $total = 0;
            $queryGetSatkerAll = DB::table('satker')->orderBy('kode_satker')->get();

            foreach ($queryGetSatkerAll as $key => $satker) {
                if ($satker->roles != "superadmin") {

                    $tbl_berita_by_satker = DB::table('berita')
                        ->where('kode_satker', $satker->kode_satker)
                        ->whereBetween('tgl_input', [$tgl_dari_default, $tgl_sampai_default]);
                    $satker_id[$counter] = $tbl_berita_by_satker->count();

                    $explode_humas_role = explode('_', $satker->roles);
                    if (isset($explode_humas_role[1])) {
                        //echo "non superadmin";
                        $complete_role = ucfirst($explode_humas_role[0]) . " " . ucfirst($explode_humas_role[1]);
                    } else if (!isset($explode_humas_role[1])) {
                        //echo "superadmin";
                        $complete_role = ucfirst($explode_humas_role[0]);
                    }
                    $nama_satker[$counter] = $satker->name . " (" . $complete_role . ")";
                    $total += $tbl_berita_by_satker->count();
                    $counter++;
                }
            }

        }
        //die;
        $realisasi_publikasi_total = $satker_id;
        $total = $total;
        $zona_satker_list_ii = $nama_satker;

        $dtBerita = $queryBerita->get();
        $dtKonfig = $queryKonfig->get();
        $satker = DB::table('satker')->get();


        if (auth()->user()->roles == 'superadmin') {
            return view('dashboard_satker.dashboardsatker', compact('satker'
                , 'dtBerita', 'dtKonfig', 'queryBeritaGrafikJumlah', 'queryBeritaGrafikKode', 'zona_satker_list_ii',
                'realisasi_publikasi_total', 'total', 'tgl_dari_default', 'tgl_sampai_default'));
        } else if (auth()->user()->roles == 'humas_kanwil') {
            return view('dashboard_satker.dashboardsatker_kanwil_nonadmin', compact('satker'
                , 'dtBerita', 'dtKonfig', 'queryBeritaGrafikJumlah', 'queryBeritaGrafikKode', 'zona_satker_list_ii',
                'realisasi_publikasi_total', 'total', 'tgl_dari_default', 'tgl_sampai_default',
                'zona_publikasi_list_ii_kanwil', 'realisasi_publikasi_kanwil_total', 'total_kanwil'
                , 'completeNameRole'));
        } else if (auth()->user()->roles == 'humas_satker') {
            return view('dashboard_satker.dashboardsatker_nonadmin', compact('satker'
                , 'dtBerita', 'dtKonfig', 'tgl_dari_default', 'tgl_sampai_default','realisasi_publikasi_total',
                'total','zona_satker_list_ii','realisasi_publikasi_kanwil_total','total_kanwil',
                'zona_publikasi_list_ii_kanwil','completeNameRole'));
        }
    }
}
