<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Karyawan;
use App\Models\Konfigurasiberita;
use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DatasatkerController extends Controller
{
    public function index(Request $request)
    {
        //$this->authorize('admin');
        $query = Satker::query();
        if (!empty($request->nama_satker)) {
            $query->where('name', 'like', '%' . $request->nama_satker . '%');
        }

        $satker = $query->paginate(10);


        /*CARA MENGGUNAKAN RAW QUERY LARAVEL*/
        $results = DB::select(DB::raw("SELECT MAX(right(kode_satker,2)) as kode FROM satker"));

        //dd($results[0]->kode);
        $kode_new = $results[0]->kode + 1;
        $kode_satker = "SAT-NTB-0" . $kode_new;
        //dd($kode_satker);
        //
        //$departemen = DB::table('departemen')->get();
        //$cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        return view('satker.index', compact('satker', 'kode_satker'));
    }

    public function store(Request $request)
    {
        $nama = strtoupper($request->nama_satker);
        $kode_satker = strtoupper($request->kode_satker);
        $email = $request->email;
        $no_hp = $request->no_hp;
        $roles = $request->role_satker;
        $password = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $foto = $kode_satker . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = null;
        }

        $cek_satker = DB::table('satker')
            ->where('name', $nama)
            ->orWhere('kode_satker', $kode_satker)
            ->orWhere('email', $email);
        //dd(($cek_satker)->count());
        //dd($nama ."-".$email."-".$no_hp."-".$roles."-".$password);
        if (($cek_satker)->count() > 0) {
            return Redirect::back()->with(['warning' => 'Nama Satker Sudah Ada / Email Telah Terdaftar']);
        } else {
            try {
                $data = [
                    "name" => $nama,
                    "kode_satker" => $kode_satker,
                    "email" => $email,
                    "no_hp" => $no_hp,
                    "roles" => $roles,
                    "password" => $password,
                    "foto" => $foto,
                    "created_at" => date('Y-m-d'),
                    "updated_at" => date('Y-m-d'),
                ];
                $simpan = DB::table('satker')->insert($data);
                if ($simpan) {
                    if ($request->hasFile('foto')) {
                        $folderPath = "public/uploads/satker";
                        $request->file('foto')->storeAs($folderPath, $foto);
                    }
                    return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
                } else {
                    return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
                }
            } catch (\Exception $e) {
                return Redirect::back()->with(['warning' => 'Data Gagal Disimpan ']);
            }
        }

    }

    public function edit(Request $request)
    {

        //$nik = $request->nik;
        //$departemen = DB::table('departemen')->get();
        //$cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        //$karyawan = DB::table('karyawan')->where('nik',$nik)->first();
        //return view('karyawan.edit',compact('departemen','karyawan','cabang'));

        $id = $request->id_satker;
        //echo $id; die;
        $satker = DB::table('satker')->where('id', $id)->first();
        return view('satker.edit', compact('satker'));
    }

    public function update($id, Request $request)
    {

        $id = $request->id;
        $nama = strtoupper($request->nama_satker);
        $kode_satker = strtoupper($request->kode_satker);
        $email = $request->email;
        $no_hp = $request->no_hp;
        $roles = $request->role_satker;
        $old_foto = $request->old_foto;

        if ($request->hasFile('foto')) {
            $foto = $kode_satker . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $old_foto;
        }

        //dd($request);
        $old_pass = DB::table('satker')->where('id', $id)->first()->password;
        //dd($old_pass);

        if (!empty($request->password)) {
            $password = Hash::make($request->password);
        } else {
            $password = $old_pass;
        }

        try {
            $data = [

                "name" => $nama,
                "kode_satker" => $kode_satker,
                "email" => $email,
                "no_hp" => $no_hp,
                "roles" => $roles,
                "password" => $password,
                "foto" => $foto,
                "updated_at" => date('Y-m-d'),
            ];
            $update = DB::table('satker')->where('id', $id)->update($data);
            if ($update) {
                if ($request->hasFile('foto')) {
                    $folderPath = "public/uploads/satker";
                    $folderPathOld = "public/uploads/satker/" . $old_foto;
                    Storage::delete($folderPathOld);
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Satker Berhasil di-Update']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Satker Gagal di-Update']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Satker Gagal di-Update']);
        }

    }

    public function delete($id)
    {
        $satker = DB::table('satker')->where('id', $id)->first();
        $foto_to_delete = $satker->foto;
        $folderPathOld = "public/uploads/satker/" . $foto_to_delete;

        $delete = DB::table('satker')->where('id', $id)->delete();
        if ($delete) {
            Storage::delete($folderPathOld);
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus!']);
        }


    }

    public function getberita($kode_satker, Request $request)
    {
        /*penggunaan define gate*/
        //$this->authorize('admin');
        $dtSatkerCek = DB::table('satker')->get();
        /*pembatasan akses data tiap role*/
        if (auth()->user()->roles == "superadmin") {
            $query = DB::table('berita')->where('kode_satker', $kode_satker);
        } else if (auth()->user()->roles == "humas_satker") {
            if ($kode_satker == auth()->user()->kode_satker) {
                $query = DB::table('berita')->where('kode_satker', $kode_satker);
            } else if ($kode_satker != auth()->user()->kode_satker) {
                abort(403);
            }
        } else if (auth()->user()->roles == "humas_kanwil") {
            if ($kode_satker == auth()->user()->kode_satker) {
                $query = DB::table('berita')->where('kode_satker', $kode_satker);
            } else if ($kode_satker != auth()->user()->kode_satker) {
                abort(403);
            }
        }

        $dtB = Berita::all();
        $satker = DB::table('satker')->where('kode_satker', $kode_satker)->first();
        $roles = $satker->roles;
        //$query = DB::table('berita')->where('kode_satker', $kode_satker);
        //dd($query->get());
        if (!empty($request->dari) && !empty($request->sampai)) {
            $query->whereBetween('tgl_input', [$request->dari, $request->sampai]);
        }
        if (!empty($request->nama_berita)) {
            $query->where('nama_berita', 'like', '%' . $request->nama_berita . '%');
        }

        $query->orderBy("tgl_input", "desc");
        $berita_satker = $query->paginate(10);
        $berita_satker->appends($request->all());

        $querysatker = $query = Satker::query();
        $querysatker->select('*');
        $dtsatker = $querysatker->get();
        if ($roles == 'humas_kanwil') {
            return view('beritasatker.index_kanwil', compact('satker', 'berita_satker', 'dtsatker'));
        } else if ($roles == 'humas_satker') {
            return view('beritasatker.index', compact('satker', 'berita_satker', 'dtsatker'));
        }
    }

    public function storeberita(Request $request)
    {
        /*media lokal*/
        for ($a = 0; $a < count($request->jumlah); $a++) {
            //echo $request->jumlah[$a]."<br>";
        }

        /*media nasional*/
        for ($b = 0; $b < count($request->jumlah_nasional); $b++) {
            //echo $request->jumlah[$a]."<br>";
        }

        /*media lokal*/
        $count_if_exist = 0;

        /*media nasional*/
        $count_if_exist_nasional = 0;

        /*media lokal*/
        if (count($request->jumlah) <= 0) {

            $count = 0;
        } else if (count($request->jumlah) > 0) {
            for ($a = 0; $a < count($request->jumlah); $a++) {
                $count_if_exist += 1;
            }
            $count = $count_if_exist;
        }

        /*media nasional*/
        if (count($request->jumlah_nasional) <= 0) {

            $count_nasional = 0;
        } else if (count($request->jumlah_nasional) > 0) {
            for ($b = 0; $b < count($request->jumlah_nasional); $b++) {
                $count_if_exist_nasional += 1;
            }
            $count_nasional = $count_if_exist_nasional;
        }

        /*media lokal*/
        if ($count != 0) {

            for ($i = 0; $i < $count; $i++) {
                $url_gabung[$i] = $request->jumlah[$i];
            }
        } else {
            $url_gabung = [];
        }

        /*media nasional*/
        if ($count_nasional != 0) {

            for ($j = 0; $j < $count_nasional; $j++) {
                $url_gabung_nasional[$j] = $request->jumlah_nasional[$j];
            }
        } else {
            $url_gabung_nasional = [];
        }

        /*store link media nasional*/

        //echo json_encode($url_gabung)."<br>";
        //echo print_r(json_decode(json_encode($url_gabung)))."<br>" ;
        //die;

        //echo json_encode($url_gabung_nasional)."<br>";
        //echo print_r(json_decode(json_encode($url_gabung_nasional))) ;
        //die;
        try {
            $data = [
                "kode_satker" => $request->kode_satker,
                "tgl_input" => date('Y-m-d'),
                "nama_berita" => $request->judul_berita_satker,
                "facebook" => $request->facebook,
                "website" => $request->website,
                "instagram" => $request->instagram,
                "twitter" => $request->twitter,
                "tiktok" => $request->tiktok,
                "sippn" => $request->sippn,
                "youtube" => $request->youtube,
                "media_lokal" => json_encode($url_gabung),
                "media_nasional" => json_encode($url_gabung_nasional),
            ];
            $simpan = DB::table('berita')->insert($data);
            if ($simpan) {

                return redirect('/datasatker/' . $request->kode_satker . '/getberita')->with(['success' => 'Data Berhasil Disimpan']);
                //return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            return redirect('/datasatker/' . $request->kode_satker . '/getberita')->with(['warning' => 'Data Gagal Disimpan']);
            //return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }


    }

    public function updatepassword($kode_satker, Request $request)
    {
        $kd_satker = $kode_satker;
        //dd($kd_satker);

        $datasatker = DB::table('satker')->where('kode_satker', $kd_satker)->first();
        $old_password = Hash::make($request->password_lama);
        //dd($old_password);
        //dd($datasatker->password);
        //dd($request->satker_name);

        $confirm_old_password = $request->password_lama; // original/plain-text
        $old_password = $datasatker->password;

        if (Hash::check($confirm_old_password, $old_password)) {
            //dd("password match");
            $password_new = $request->password_baru;
            $password_new_confirm = $request->konfirmasi_password_baru;
            if ($password_new == $password_new_confirm) {
                try {
                    $data_to_update = [
                        "updated_at" => date('Y-m-d'),
                        "password" => Hash::make($password_new),
                    ];
                    $update = DB::table('satker')->where('kode_satker', $kd_satker)->update($data_to_update);
                    if ($update) {
                        return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
                    } else {
                        return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
                    }
                } catch (\Exception $e) {
                    return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
                }
            } else if ($password_new != $password_new_confirm) {
                return Redirect::back()->with(['warning' => 'Password Baru dan Konfirmasi Password Baru Salah']);

            }
        } else {
            //dd("password doesnt match");
            return Redirect::back()->with(['warning' => 'Password Lama Salah']);
        }


    }

    public function tampilkandetailberita(Request $request)
    {
        $id_berita = $request->id_berita;

        //dd($id_berita);
        $databerita = DB::table('berita')->where('id_berita', $id_berita)->first();
        //dd($databerita->media_lokal);
        return view('beritasatker.detail', compact('databerita'));
    }

    public function pilih_konfigurasi_berita(Request $request)
    {
        //return $request;
        //return "ini respond bro : ".$request->id_berita;
        //return "ini respond bro : ".$request->kode_satker;

        $id_berita = $request->id_berita;
        $kode_satker = $request->kode_satker;

        $databerita = DB::table('berita')->where('id_berita', $id_berita)->first();
        //return $kode_satker;
        //dd($databerita->media_lokal);
        $konfigurasi_berita = "Konfigurasi Berita";
        /*double conditions where*/
        $datakonfig = DB::table('konfigurasi_berita')
            ->where('kode_satker', $kode_satker)
            ->where('jenis_konfig', $konfigurasi_berita)->get();
        //return $datakonfig;
        return view('beritasatker.pilih_konfigurasi_berita', compact('databerita'
            , 'datakonfig', 'kode_satker', 'id_berita'));
    }

    public function pilihkonfigurasi(Request $request)
    {
        //return ($request);
        //return $request->kode_satker_value;
        $kode_satker_value = $request->kode_satker_value;
        $satker = DB::table('satker')->where('kode_satker', $kode_satker_value)->first();

        $dtBerita = DB::table('berita')->where('kode_satker', $kode_satker_value)
            ->where('tgl_input', date('Y-m-d'))->get();

        $konfigurasi_rekap = "Konfigurasi Rekap";
        $konfigurasi_berita = "Konfigurasi Berita";
        $datakonfig = DB::table('konfigurasi_berita')
            ->where('kode_satker', $kode_satker_value)
            ->where('jenis_konfig', $konfigurasi_berita)->get();
        //return $datakonfig;
        $sizeBerita = sizeof($dtBerita);

        return view('beritasatker.pilih_konfigurasi', compact(
            'satker', 'sizeBerita', 'dtBerita', 'datakonfig', 'kode_satker_value'));
    }

    public function pilihkonfigurasi_kanwil(Request $request)
    {
        //return $request;
        $querysatker = $query = Satker::query();
        $querysatker->select('*');
        $dtsatker = $querysatker->get();
        //return $dtsatker;

        $kode_satker_value = $request->kode_satker_value;
        $satkers = DB::table('satker')->where('kode_satker', $kode_satker_value)->first();

        $role = $satkers->roles;
        //return $kode_satker_value;

        $dtBerita = DB::table('berita')->where('kode_satker', $kode_satker_value)
            ->where('tgl_input', date('Y-m-d'))->get();
        //return "tes";

        $konfigurasi_rekap = 'Konfigurasi Rekap';
        $datakonfig = DB::table('konfigurasi_berita')
            ->where('kode_satker', $kode_satker_value)
            ->where('jenis_konfig', $konfigurasi_rekap)->get();
        //return $datakonfig;
        $sizeBerita = sizeof($dtBerita);
        //return $sizeBerita;
        //return $sizeBerita;
        return view('beritasatker.pilih_konfigurasi_kanwil',
            compact('dtsatker', 'sizeBerita', 'dtBerita', 'datakonfig', 'kode_satker_value'));
    }

    public function whatssapgenerate_message(Request $request)
    {
        //return $request;
        $id_berita = $request->id_berita;
        $id_konfig = $request->id_konfig;
        $kode_satker = $request->kode_satker;

        $dtBerita = DB::table('berita')->where('id_berita', $id_berita)->first();
        $dtKonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        //return json_decode($dtKonfig->jumlah_tembusan_yth)[0];
        return view('beritasatker.whatssapgenerate_message', compact('dtBerita', 'dtKonfig'));
        //return $dtKonfig;

    }

    public function whatssapgenerate_message_today(Request $request)
    {
        //return Auth::guard('satker')->user()->roles;
        //return auth()->user()->roles;
        //return $request;
        $id_konfig = $request->id_konfig;
        $id_berita = $request->id_berita;
        $kode_satker = $request->kode_satker;
        //kode_satker
        //id_berita
        //return $request;

        $time = date('Y-m-d');
        $dtKonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $getBerita = DB::table('berita')
            ->where('kode_satker', $kode_satker)
            ->where('tgl_input', date('Y-m-d'))
            ->get();
        $phpword = new \PhpOffice\PhpWord\PhpWord;

        $firstStyle = 'firstStyle';
        $secondtStyle = 'secondStyle';
        $phpword->addFontStyle(
            $firstStyle, array('name' => 'Arial', 'size' => 12, 'bold' => true)
        );

        $phpword->addFontStyle(
            $secondtStyle, array('name' => 'Arial', 'size' => 12, 'bold' => false)
        );

        $section = $phpword->addSection();
        $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
        $text = $section->addText("");
        $text = $section->addText($dtKonfig->yth, $secondtStyle);
        $text = $section->addText('Dari : ' . $dtKonfig->dari_pengirim, $secondtStyle);
        $text = $section->addText('');
        $text = $section->addText('Tembusan Yth:', $firstStyle);
        $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
        foreach ($jml_tembusan_yth as $key => $dt) {
            $nomer = $key + 1;
            $text = $section->addText("$nomer ." . $dt, $secondtStyle);
        }


        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember",
        ];
        $dateCurrentNumberDate = date('Y-m-d');
        $dateNumberOfDate = explode('-', $dateCurrentNumberDate)[2];
        $dateCurrent = date('Y-m-D');
        $explodeCurrent = explode('-', $dateCurrent);
        $tgl = $explodeCurrent[2];
        $bulan = $explodeCurrent[1];
        if (substr($bulan, 0, 1) == 0) {
            $bulan = substr($bulan, 1, 1);
        } else if (substr($bulan, 0, 1) == 1) {
            $bulan = substr($bulan, 0, 2);
        }
        $tahun = $explodeCurrent[0];

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => "Jum'at",
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$tgl];
        $getCompleteDate = $hari . ', ' . $dateNumberOfDate . " " . $namabulan[$bulan] . " " . $tahun;
        //return $getCompleteDate;

        $text = $section->addText('');
        $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);
        $no = 0;
        foreach ($getBerita as $index => $news) {
            $no = $index + 1;
            $text = $section->addText($no . ". " . $news->nama_berita, $firstStyle);
            $text = $section->addText('');
            if ($news->facebook != "") {
                $text = $section->addText('LINK FACEBOOK : ', $firstStyle);
                $text = $section->addText($news->facebook, $secondtStyle);
            }

            $text = $section->addText('');
            if ($news->instagram != "") {
                $text = $section->addText('LINK INSTAGRAM : ', $firstStyle);
                $text = $section->addText($news->instagram, $secondtStyle);
            }

            $text = $section->addText('');
            if ($news->twitter != "") {
                $text = $section->addText('LINK TWITTER : ', $firstStyle);
                $text = $section->addText($news->twitter, $secondtStyle);
            }

            $text = $section->addText('');
            if ($news->tiktok != "") {
                $text = $section->addText('LINK TIKTOK : ', $firstStyle);
                $text = $section->addText($news->tiktok, $secondtStyle);
            }

            $text = $section->addText('');
            if ($news->youtube != "") {
                $text = $section->addText('LINK YOUTUBE : ', $firstStyle);
                $text = $section->addText($news->youtube, $secondtStyle);
            }
            $text = $section->addText('');
        }

        if (auth()->user()->roles == "humas_kanwil" || auth()->user()->roles == "superadmin") {
            $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
            $text = $section->addText("Hormat Kamii : ", $secondtStyle);
            $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
            $text = $section->addText('');
            $text = $section->addText("============================================================", $secondtStyle);

            $text = $section->addText('');
            $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->yth, $secondtStyle);
            $text = $section->addText("Dari : " . $dtKonfig->dari_pengirim, $secondtStyle);
            $text = $section->addText("");
            $text = $section->addText('Tembusan Yth:', $firstStyle);
            $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
            foreach ($jml_tembusan_yth as $key => $dt) {
                $nomer = $key + 1;
                $text = $section->addText("$nomer ." . $dt, $secondtStyle);
            }
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);
            $text = $section->addText('');
        }

        $text = $section->addText("Link Publikasi Media Eksternal : ", $firstStyle);
        $text = $section->addText('');

        $number = 0;
        /*link berita website*/
        foreach ($getBerita as $index_web => $news_web) {
            $number += 1;
            $text = $section->addText($number . ". " . $news->nama_berita, $firstStyle);
            $text = $section->addText($news->website, $secondtStyle);
            $text = $section->addText("");
        }

        $nmbr = $number;
        $nmr = $number;

        foreach ($getBerita as $index => $news) {
            foreach (json_decode($news->media_lokal) as $num => $medlok) {
                $nmr += 1;
                $nmbr += 1;
                $explode = explode("|||", $medlok);
                $text = $section->addText($nmr . ". " . $explode[0], $firstStyle);
                $text = $section->addText($explode[1], $secondtStyle);
                $text = $section->addText("");
            }
            $nmr = $nmbr;
        }

        $nmbr_nas = $nmr;
        $nmr_nas = $nmr;
        foreach ($getBerita as $index => $news) {
            foreach (json_decode($news->media_nasional) as $num_nas => $mednas) {
                $nmr_nas += 1;
                $nmbr_nas += 1;
                $explode_nas = explode("|||", $mednas);
                $text = $section->addText($nmr_nas . ". " . $explode_nas[0], $firstStyle);
                $text = $section->addText($explode_nas[1], $secondtStyle);
                $text = $section->addText("");
            }
            $nmr_nas = $nmbr_nas;
        }

        if (auth()->user()->roles == 'superadmin' || auth()->user()->roles == 'humas_kanwil') {
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
            $text = $section->addText("Hormat Kami : ", $secondtStyle);
            $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
            $text = $section->addText('');
        } else if (auth()->user()->roles == 'humas_satker') {
            /*sayang*/
            foreach (json_decode($dtKonfig->jumlah_hashtag) ?? [] as $idx => $hashtag) {
                $text = $section->addText($hashtag, $secondtStyle);
            }
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->jargon, $firstStyle);
            $text = $section->addText('');
            foreach (json_decode($dtKonfig->jumlah_moto) ?? [] as $idx_moto => $moto) {
                $text = $section->addText($moto, $secondtStyle);
            }
            $text = $section->addText('');
            $text = $section->addText($dtKonfig->penutup, $secondtStyle);
            $text = $section->addText($dtKonfig->salam_penutup, $firstStyle);
        }


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
        $objWriter->save('LaporanWhatssap' . $time . '.docx');
        return response()->download(public_path('LaporanWhatssap' . $time . ".docx"));


    }

    public function whatssapgenerate_message_today_kanwil(Request $request)
    {
        //return $request;
        //echo $request->id_konfig ."<br>";
        //echo $request->kode_satker_pilihan;
        //die;

        $sizeBerita = $request->sizeBerita;
        $kode_satker_value = $request->kode_satker_value;
        $id_konfig = $request->id_konfig;
        $kode_satker_pilihan = $request->kode_satker_pilihan;
        //return $kode_satker_pilihan;
        $time = date('Y-m-d');
        $dtKonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();

        if ($kode_satker_pilihan != "all") {
            $namaSatker = DB::table('satker')->where('kode_satker', $request->kode_satker_pilihan)->first()->name;
            //return $kode_satker_pilihan;
            $dtBerita = DB::table('berita')
                ->where('kode_satker', $kode_satker_pilihan)
                ->where('tgl_input', date('Y-m-d'))
                ->get();
            //return $dtBerita;
            //return sizeof($dtBerita);
            if (sizeof($dtBerita) > 0) {
                //return "tyty";
                //return sizeof($dtBerita);
                $phpword = new \PhpOffice\PhpWord\PhpWord;
                $firstStyle = 'firstStyle';
                $secondtStyle = 'secondStyle';
                $phpword->addFontStyle(
                    $firstStyle, array('name' => 'Arial', 'size' => 12, 'bold' => true)
                );
                $phpword->addFontStyle(
                    $secondtStyle, array('name' => 'Arial', 'size' => 12, 'bold' => false)
                );

                $section = $phpword->addSection();
                $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
                $text = $section->addText("");
                $text = $section->addText($dtKonfig->yth, $secondtStyle);
                $text = $section->addText("Dari : " . $dtKonfig->dari_pengirim, $secondtStyle);
                $text = $section->addText("");
                $text = $section->addText('Tembusan Yth:', $firstStyle);

                $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
                foreach ($jml_tembusan_yth as $key => $dt) {
                    $nomer = $key + 1;
                    $text = $section->addText("$nomer ." . $dt, $secondtStyle);
                }

                $text = $section->addText('');

                $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember",
                ];
                $dateCurrentNumberDate = date('Y-m-d');
                $dateNumberOfDate = explode('-', $dateCurrentNumberDate)[2];
                $dateCurrent = date('Y-m-D');
                $explodeCurrent = explode('-', $dateCurrent);
                $tgl = $explodeCurrent[2];
                $bulan = $explodeCurrent[1];

                if (substr($bulan, 0, 1) == 0) {
                    $bulan = substr($bulan, 1, 1);
                } else if (substr($bulan, 0, 1) == 1) {
                    $bulan = substr($bulan, 0, 2);
                }
                $tahun = $explodeCurrent[0];

                $dayList = array(
                    'Sun' => 'Minggu',
                    'Mon' => 'Senin',
                    'Tue' => 'Selasa',
                    'Wed' => 'Rabu',
                    'Thu' => 'Kamis',
                    'Fri' => "Jum'at",
                    'Sat' => 'Sabtu'
                );
                $hari = $dayList[$tgl];
                $getCompleteDate = $hari . ', ' . $dateNumberOfDate . " " . $namabulan[$bulan] . " " . $tahun;
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);

                //return sizeof($dtBerita);
                //return $dtBerita[0]->nama_berita;
                foreach ($dtBerita as $index => $news) {
                    //return $dtBerita[0];
                    $no = $index + 1;
                    $text = $section->addText($no . ". " . $news->nama_berita, $firstStyle);
                    //echo $no;
                    $text = $section->addText('');
                    if ($news->facebook != "") {
                        $text = $section->addText('LINK FACEBOOK : ', $firstStyle);
                        $text = $section->addText($news->facebook, $secondtStyle);
                    }


                    $text = $section->addText('');
                    if ($news->instagram != "") {
                        $text = $section->addText('LINK INSTAGRAM : ', $firstStyle);
                        $text = $section->addText($news->instagram, $secondtStyle);
                    }


                    $text = $section->addText('');
                    if ($news->twitter != "") {
                        $text = $section->addText('LINK TWITTER : ', $firstStyle);
                        $text = $section->addText($news->twitter, $secondtStyle);
                    }


                    $text = $section->addText('');
                    if ($news->tiktok != "") {
                        $text = $section->addText('LINK TIKTOK : ', $firstStyle);
                        $text = $section->addText($news->tiktok, $secondtStyle);
                    }


                    $text = $section->addText('');
                    if ($news->youtube != "") {
                        $text = $section->addText('LINK YOUTUBE : ', $firstStyle);
                        $text = $section->addText($news->youtube, $secondtStyle);
                    }
                    $text = $section->addText('');
                    //echo $news->youtube;
                }
                //die;
                $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
                $text = $section->addText("Hormat Kami : ", $secondtStyle);
                $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText("============================================================", $secondtStyle);

                $text = $section->addText('');
                $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->yth, $secondtStyle);
                $text = $section->addText("Dari : " . $dtKonfig->dari_pengirim, $secondtStyle);
                $text = $section->addText("");
                $text = $section->addText('Tembusan Yth:', $firstStyle);
                $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
                foreach ($jml_tembusan_yth as $key => $dt) {
                    $nomer = $key + 1;
                    $text = $section->addText("$nomer ." . $dt, $secondtStyle);
                }
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);
                $text = $section->addText('');

                $number = 0;
                /*link berita website*/
                foreach ($dtBerita as $index_web => $news_web) {
                    $number += 1;
                    $text = $section->addText($number . ". " . $news->nama_berita, $firstStyle);
                    $text = $section->addText($news->website, $secondtStyle);
                    $text = $section->addText("");
                }

                $nmbr = $number;
                $nmr = $number;

                foreach ($dtBerita as $index => $news) {
                    foreach (json_decode($news->media_lokal) as $num => $medlok) {
                        $nmr += 1;
                        $nmbr += 1;
                        $explode = explode("|||", $medlok);
                        $text = $section->addText($nmr . ". " . $explode[0], $firstStyle);
                        $text = $section->addText($explode[1], $secondtStyle);
                        $text = $section->addText("");
                    }
                    $nmr = $nmbr;
                }

                $nmbr_nas = $nmr;
                $nmr_nas = $nmr;
                foreach ($dtBerita as $index => $news) {
                    foreach (json_decode($news->media_nasional) as $num_nas => $mednas) {
                        $nmr_nas += 1;
                        $nmbr_nas += 1;
                        $explode_nas = explode("|||", $mednas);
                        $text = $section->addText($nmr_nas . ". " . $explode_nas[0], $firstStyle);
                        $text = $section->addText($explode_nas[1], $secondtStyle);
                        $text = $section->addText("");
                    }
                    $nmr_nas = $nmbr_nas;
                }

                $text = $section->addText('');
                $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
                $text = $section->addText("Hormat Kami : ", $secondtStyle);
                $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
                $text = $section->addText('');

                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
                $objWriter->save('LaporanWhatssapRekap' . $namaSatker . $time . '.docx');
                return response()->download(public_path('LaporanWhatssapRekap' . $namaSatker . $time . '.docx'));

            } else {
                return Redirect::back()->with(['warning' => 'Data Berita Hari Ini Satker ' . $namaSatker . ' Belum Ada!']);
            }
            //return $namaSatker;
        } else if ($kode_satker_pilihan == "all") {
            $namaSatker = "Seluruh Satker";
            //dd($namaSatker);
            //dd($request->id_konfig);
            $dtBerita = DB::table('berita')->where('tgl_input', date('Y-m-d'))->get();
            //dd($dtBerita[0]->nama_berita);
            //dd($dtBerita);
            //return ($dtBerita);
            //return sizeof($dtBerita);
            if (sizeof($dtBerita) != 0) {
                $phpword = new \PhpOffice\PhpWord\PhpWord;
                $firstStyle = 'firstStyle';
                $secondtStyle = 'secondStyle';

                $phpword->addFontStyle(
                    $firstStyle, array('name' => 'Arial', 'size' => 12, 'bold' => true)
                );
                $phpword->addFontStyle(
                    $secondtStyle, array('name' => 'Arial', 'size' => 12, 'bold' => false)
                );
                $section = $phpword->addSection();
                $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
                $text = $section->addText("");
                $text = $section->addText($dtKonfig->yth, $secondtStyle);
                $text = $section->addText("Dari : " . $dtKonfig->dari_pengirim, $secondtStyle);
                $text = $section->addText("");
                $text = $section->addText('Tembusan Yth:', $firstStyle);

                $jml_tembusan_yth_all = json_decode($dtKonfig->jumlah_tembusan_yth);
                foreach ($jml_tembusan_yth_all as $key_all => $dt_all) {
                    $nomer_all = $key_all + 1;
                    $text = $section->addText("$nomer_all ." . $dt_all, $secondtStyle);
                }
                $text = $section->addText('');
                $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember",
                ];
                $dateCurrentNumberDate = date('Y-m-d');
                $dateNumberOfDate = explode('-', $dateCurrentNumberDate)[2];
                $dateCurrent = date('Y-m-D');
                $explodeCurrent = explode('-', $dateCurrent);
                $tgl = $explodeCurrent[2];
                $bulan = $explodeCurrent[1];

                if (substr($bulan, 0, 1) == 0) {
                    $bulan = substr($bulan, 1, 1);
                } else if (substr($bulan, 0, 1) == 1) {
                    $bulan = substr($bulan, 0, 2);
                }

                $tahun = $explodeCurrent[0];

                $dayList = array(
                    'Sun' => 'Minggu',
                    'Mon' => 'Senin',
                    'Tue' => 'Selasa',
                    'Wed' => 'Rabu',
                    'Thu' => 'Kamis',
                    'Fri' => "Jum'at",
                    'Sat' => 'Sabtu'
                );
                $hari = $dayList[$tgl];
                $getCompleteDate = $hari . ', ' . $dateNumberOfDate . " " . $namabulan[$bulan] . " " . $tahun;
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);

                $no = 0;
                $no_berita_satker = 0;
                /*data berita kanwil (sosmed only)*/
                foreach ($dtBerita as $index => $news) {
                    //return "woy";
                    //die;
                    //return $dtBerita[0];
                    //echo $news->kode_satker."<br>";
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    //echo $getSatkerRole."<br>"; die;
                    /*untuk mengutamakan berita kanwil diatas*/
                    if ($getSatkerRole == 'humas_kanwil') {
                        //echo "woit"; die;
                        $no += 1;
                        $text = $section->addText($no . ". " . $news->nama_berita, $firstStyle);
                        $text = $section->addText('');
                        if ($news->facebook != "") {
                            $text = $section->addText('LINK FACEBOOK : ', $firstStyle);
                            $text = $section->addText($news->facebook, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->instagram != "") {
                            $text = $section->addText('LINK INSTAGRAM : ', $firstStyle);
                            $text = $section->addText($news->instagram, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->twitter != "") {
                            $text = $section->addText('LINK TWITTER : ', $firstStyle);
                            $text = $section->addText($news->twitter, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->tiktok != "") {
                            $text = $section->addText('LINK TIKTOK : ', $firstStyle);
                            $text = $section->addText($news->tiktok, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->youtube != "") {
                            $text = $section->addText('LINK YOUTUBE : ', $firstStyle);
                            $text = $section->addText($news->youtube, $secondtStyle);
                        }
                        $text = $section->addText('');

                    }

                }

                /*data berita satker (sosmed only)*/
                $no_berita_satker = $no;
                foreach ($dtBerita as $index => $news) {
                    //return $dtBerita[0];
                    //echo $news->kode_satker."<br>";
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    //echo $getSatkerRole."<br>";
                    if ($getSatkerRole == 'humas_satker') {

                        $no_berita_satker += 1;
                        $text = $section->addText($no_berita_satker . ". " . $news->nama_berita, $firstStyle);

                        $text = $section->addText('');
                        if ($news->facebook != "") {
                            $text = $section->addText('LINK FACEBOOK : ', $firstStyle);
                            $text = $section->addText($news->facebook, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->instagram != "") {
                            $text = $section->addText('LINK INSTAGRAM : ', $firstStyle);
                            $text = $section->addText($news->instagram, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->twitter != "") {
                            $text = $section->addText('LINK TWITTER : ', $firstStyle);
                            $text = $section->addText($news->twitter, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->tiktok != "") {
                            $text = $section->addText('LINK TIKTOK : ', $firstStyle);
                            $text = $section->addText($news->tiktok, $secondtStyle);
                        }


                        $text = $section->addText('');
                        if ($news->youtube != "") {
                            $text = $section->addText('LINK YOUTUBE : ', $firstStyle);
                            $text = $section->addText($news->youtube, $secondtStyle);
                        }

                        $text = $section->addText('');
                    }
                }
                //echo $no; die;
                $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
                $text = $section->addText("Hormat Kami : ", $secondtStyle);
                $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText("============================================================", $secondtStyle);

                $text = $section->addText('');
                $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->yth, $secondtStyle);
                $text = $section->addText("Dari : " . $dtKonfig->dari_pengirim, $secondtStyle);
                $text = $section->addText("");
                $text = $section->addText('Tembusan Yth:', $firstStyle);
                $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
                foreach ($jml_tembusan_yth as $key => $dt) {
                    $nomer = $key + 1;
                    $text = $section->addText("$nomer ." . $dt, $secondtStyle);
                }
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :sss", $secondtStyle);
                $text = $section->addText('');


                /*data berita website dan media eksternal */
                $no_berita_eksternal = 0;
                $no_berita_eksternal_2 = 0;
                $no_berita_eksternal_3 = 0;
                $no_berita_eksternal_4 = 0;
                foreach ($dtBerita as $index => $news) {
                    //return $dtBerita[0];
                    //echo $news->kode_satker."<br>";
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    //echo $getSatkerRole."<br>";
                    if ($getSatkerRole == 'humas_kanwil') {

                        $no_berita_eksternal += 1;
                        $text = $section->addText($no_berita_eksternal . ". " . $news->nama_berita, $firstStyle);
                        $text = $section->addText($news->website, $secondtStyle);
                        $text = $section->addText('');

                    }
                }

                $no_berita_eksternal_2 = $no_berita_eksternal;
                foreach ($dtBerita as $index => $news) {
                    //return $dtBerita[0];
                    //echo $news->kode_satker."<br>";
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    //echo $getSatkerRole."<br>";
                    if ($getSatkerRole == 'humas_kanwil') {
                        foreach (json_decode($news->media_lokal) as $num => $medlok) {
                            $no_berita_eksternal_2 += 1;
                            $explode = explode('|||', $medlok);
                            $text = $section->addText($no_berita_eksternal_2 . ". " . $explode[0], $firstStyle);
                            $text = $section->addText($explode[1], $secondtStyle);
                            //$text = $section->addText($no_berita_eksternal_2 . ". " . $medlok, $secondtStyle);
                            $text = $section->addText('');
                        }


                    }
                }

                $no_berita_eksternal_3 = $no_berita_eksternal_2;
                foreach ($dtBerita as $index => $news) {
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    if ($getSatkerRole == 'humas_satker') {
                        foreach (json_decode($news->media_lokal) as $num => $medlok) {
                            $no_berita_eksternal_3 += 1;
                            $explode = explode('|||', $medlok);
                            $text = $section->addText($no_berita_eksternal_3 . ". " . $explode[0], $firstStyle);
                            $text = $section->addText($explode[1], $secondtStyle);
                            $text = $section->addText('');
                        }

                    }
                }

                $no_berita_eksternal_4 = $no_berita_eksternal_3;
                foreach ($dtBerita as $index => $news) {
                    $getSatkerRole = DB::table('satker')->where('kode_satker', $news->kode_satker)->first()->roles;
                    if ($getSatkerRole == 'humas_satker') {
                        foreach (json_decode($news->media_nasional) as $num => $mednas) {
                            $no_berita_eksternal_4 += 1;
                            $explode = explode('|||', $mednas);
                            $text = $section->addText($no_berita_eksternal_4 . ". " . $explode[0], $firstStyle);
                            $text = $section->addText($explode[1], $secondtStyle);
                            $text = $section->addText('');
                        }

                    }
                }

                $text = $section->addText('');
                $text = $section->addText($dtKonfig->salam_penutup, $secondtStyle);
                $text = $section->addText("Hormat Kami : ", $secondtStyle);
                $text = $section->addText($dtKonfig->ttd_kakanwil, $secondtStyle);
                $text = $section->addText('');
                $text = $section->addText($dtKonfig->nama_kakanwil, $secondtStyle);
                $text = $section->addText('');

                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
                $objWriter->save('LaporanWhatssapRekapSemuaSatker' . $time . '.docx');
                return response()->download(public_path('LaporanWhatssapRekapSemuaSatker' . $time . ".docx"));

            } else {
                return Redirect::back()->with(['warning' => 'Data Berita ' . $namaSatker . ' Hari Ini Belum Ada!']);
            }
            //return $dtBerita;
        }


    }

    public function whatssapgenerate_message_news(Request $request)
    {
        $id_konfig = $request->id_konfig;
        $id_berita = $request->id_berita;
        $kode_satker = $request->kode_satker;
        //return $request;

        //$time = date('Y-m-d');
        $dtKonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $getBerita = DB::table('berita')
            ->where('kode_satker', $kode_satker)
            ->where('id_berita', $id_berita)
            ->get();
        $time = $getBerita[0]->tgl_input;
        //return $time;
        //return $getBerita;
        $phpword = new \PhpOffice\PhpWord\PhpWord;

        $firstStyle = 'firstStyle';
        $secondtStyle = 'secondStyle';
        $phpword->addFontStyle(
            $firstStyle, array('name' => 'Arial', 'size' => 12, 'bold' => true)
        );

        $phpword->addFontStyle(
            $secondtStyle, array('name' => 'Arial', 'size' => 12, 'bold' => false)
        );

        $section = $phpword->addSection();
        $text = $section->addText($dtKonfig->salam_pembuka, $firstStyle);
        $text = $section->addText("");
        $text = $section->addText($dtKonfig->yth, $secondtStyle);
        $text = $section->addText("");
        $text = $section->addText('Tembusan Yth:', $firstStyle);

        $jml_tembusan_yth = json_decode($dtKonfig->jumlah_tembusan_yth);
        foreach ($jml_tembusan_yth ?? [] as $key => $dt) {
            $nomer = $key + 1;
            $text = $section->addText("$nomer ." . $dt, $secondtStyle);
        }

        $text = $section->addText('');
        $text = $section->addText('Dari : ' . $dtKonfig->dari_pengirim, $secondtStyle);

        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember",
        ];
        $dateCurrentNumberDate = $time;
        //return $dateCurrentNumberDate;
        $dateNumberOfDate = explode('-', $dateCurrentNumberDate)[2];
        //$dateCurrent = date('Y-m-D');

        $dateCurrent = date('Y-m-D', strtotime($dateCurrentNumberDate));
        //return $dateCurrent;
        $explodeCurrent = explode('-', $dateCurrent);
        $tgl = $explodeCurrent[2];
        $bulan = $explodeCurrent[1];
        if (substr($bulan, 0, 1) == 0) {
            $bulan = substr($bulan, 1, 1);
        } else if (substr($bulan, 0, 1) == 1) {
            $bulan = substr($bulan, 0, 2);
        }
        $tahun = $explodeCurrent[0];

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => "Jum'at",
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$tgl];
        $getCompleteDate = $hari . ', ' . $dateNumberOfDate . " " . $namabulan[$bulan] . " " . $tahun;
        //return $getCompleteDate;
        $text = $section->addText('');
        $text = $section->addText($dtKonfig->pengantar . ", $getCompleteDate :", $secondtStyle);

        $text = $section->addText('');

        foreach ($getBerita ?? [] as $index => $news) {
            $no = $index + 1;
            $text = $section->addText($no . '. ' . $news->nama_berita, $firstStyle);

            $text = $section->addText('');
            $text = $section->addText('Berita Selengkapnya bisa dilihat pada halaman berikut : ', $secondtStyle);

            $text = $section->addText('');
            $text = $section->addText('Facebook: ', $firstStyle);
            $text = $section->addText($news->facebook, $secondtStyle);

            $text = $section->addText('');
            $text = $section->addText('Instagram: ', $firstStyle);
            $text = $section->addText($news->instagram, $secondtStyle);

            $text = $section->addText('');
            $text = $section->addText('Twitter: ', $firstStyle);
            $text = $section->addText($news->twitter, $secondtStyle);

            $text = $section->addText('');
            $text = $section->addText('Media Lokal : ', $firstStyle);
//            ..
            $text = $section->addText('');
            $text = $section->addText('Website: ', $firstStyle);

            $numb = 1;
            $text = $section->addText($numb . '. ' . $news->nama_berita, $firstStyle);
            $text = $section->addText($news->website, $secondtStyle);
//            ..
            $text = $section->addText('');
            foreach (json_decode($news->media_lokal) ?? [] as $num => $medlok) {
                $number = ($numb + $num) + 1;
//                $number = $number + 1;

                $explode = explode("|||", $medlok);
                $text = $section->addText($number . "." . $explode[0], $firstStyle);
                $text = $section->addText($explode[1], $secondtStyle);
                $text = $section->addText('');
            }

            $text = $section->addText('');
            $text = $section->addText('Media Nasional : ', $firstStyle);
            foreach (json_decode($news->media_nasional) ?? [] as $num_nas => $mednas) {
                $number_nas = $num_nas + 1;

                $explode = explode("|||", $mednas);
                $text = $section->addText($number_nas . "." . $explode[0], $firstStyle);
                $text = $section->addText($explode[1], $secondtStyle);
                $text = $section->addText('');
                //$text = $section->addText($number_nas . "." . $mednas, $secondtStyle);
            }
            $text = $section->addText('');
        }

        foreach (json_decode($dtKonfig->jumlah_hashtag) ?? [] as $idx => $hashtag) {
            $text = $section->addText($hashtag, $secondtStyle);
        }
        $text = $section->addText('');
        $text = $section->addText($dtKonfig->jargon, $firstStyle);
        $text = $section->addText('');
        foreach (json_decode($dtKonfig->jumlah_moto) ?? [] as $idx_moto => $moto) {
            $text = $section->addText($moto, $secondtStyle);
        }
        $text = $section->addText('');
        $text = $section->addText($dtKonfig->penutup, $secondtStyle);
        $text = $section->addText($dtKonfig->salam_penutup, $firstStyle);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
        $objWriter->save('LaporanWhatssap' . $time . '.docx');
        return response()->download(public_path('LaporanWhatssap' . $time . ".docx"));


    }

    public function deleteberita($id_berita, $kode_satker)
    {
        $kd_satker_saved = $kode_satker;
        $delete = DB::table('berita')->where('id_berita', $id_berita)->delete();
        if ($delete) {
            return redirect('/datasatker/' . $kd_satker_saved . '/getberita')->with(['success' => 'Data Berhasil Dihapus']);
            //return Redirect::back()->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/datasatker/' . $kd_satker_saved . '/getberita')->with(['warning' => 'Data Gagal Dihapus']);
            //return Redirect::back()->with(['warning' => 'Data Gagal Dihapus!']);

        }
    }

    public function editberita(Request $request)
    {
        $id_berita = $request->id_berita;
        $berita = DB::table('berita')->where('id_berita', $id_berita)->first();
        return view('beritasatker.edit', compact('berita'));
    }

    public function hapuslink(Request $request)
    {
        //dd($request);
        $link = $request->link;
        $key = $request->key;
        $id_berita = $request->id_berita;
        $databerita = DB::table('berita')->where('id_berita', $id_berita)->first();
        //return "ini respon dari controller : ".$id_berita;

        $links_media_lokal = json_decode($databerita->media_lokal);
        $array = [];
        //return ($array);
        //return count($links_media_lokal);
        if (($key = array_search($link, $links_media_lokal)) !== false) {
            unset($links_media_lokal[$key]);
        }

        try {
            $data_to_update = [
                "nama_berita" => $databerita->nama_berita,
                "kode_satker" => $databerita->kode_satker,
                "facebook" => $databerita->facebook,
                "website" => $databerita->website,
                "instagram" => $databerita->instagram,
                "twitter" => $databerita->twitter,
                "tiktok" => $databerita->tiktok,
                "sippn" => $databerita->sippn,
                "youtube" => $databerita->youtube,
                "media_lokal" => json_encode(count($links_media_lokal) > 0 ? array_values($links_media_lokal) : null),
                "tgl_update" => date('Y-m-d')
//            "media_nasional"=>$databerita->media_nasional,
            ];
            $update = DB::table('berita')->where('id_berita', $id_berita)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Link Media Lokal Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Link Media Lokal Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Link Media Lokal Gagal dihapus']);
        }

    }

    public function hapuslink_nasional(Request $request)
    {
        //dd($request);
        $link = $request->link_nasional;
        $key = $request->key_nasional;
        $id_berita = $request->id_berita_nasional;
        $databerita_nasional = DB::table('berita')->where('id_berita', $id_berita)->first();

        $links_media_nasional = json_decode($databerita_nasional->media_nasional);
        //return count($links_media_lokal);
        if (($key = array_search($link, $links_media_nasional)) !== false) {
            unset($links_media_nasional[$key]);
        }

        try {
            $data_to_update = [
                "nama_berita" => $databerita_nasional->nama_berita,
                "kode_satker" => $databerita_nasional->kode_satker,
                "facebook" => $databerita_nasional->facebook,
                "website" => $databerita_nasional->website,
                "instagram" => $databerita_nasional->instagram,
                "twitter" => $databerita_nasional->twitter,
                "tiktok" => $databerita_nasional->tiktok,
                "sippn" => $databerita_nasional->sippn,
                "youtube" => $databerita_nasional->youtube,
                //"media_lokal"=>json_encode(count($links_media_lokal)>0?array_values($links_media_lokal):null),
                "media_nasional" => json_encode(count($links_media_nasional) > 0 ? array_values($links_media_nasional) : null),
            ];
            $update = DB::table('berita')->where('id_berita', $id_berita)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Link Media Nasional Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Link Media Nasional Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Link Media Nasional Gagal dihapus']);
        }

    }

    public function updateberita($id_berita, Request $request)
    {
        $id = $id_berita;

        /*media lokal*/
        if ($request->jumlah_edit != null) {
            $media_lokal = count($request->jumlah_edit);
        } else if ($request->jumlah_edit == null) {
            $media_lokal = 0;
        }

        //dd($media_lokal);
        //die;

        for ($a = 0; $a < $media_lokal; $a++) {
            //echo $request->jumlah[$a]."<br>";
        }

        /*media nasional*/
        if ($request->jumlah_edit_nasional != null) {
            $media_nasional = count($request->jumlah_edit_nasional);
        } else if ($request->jumlah_edit_nasional == null) {
            $media_nasional = 0;
        }


        for ($b = 0; $b < $media_nasional; $b++) {
            //echo $request->jumlah[$a]."<br>";
        }
        //dd($media_nasional);
        //die;

        $count_if_exist = 0;

        $count_if_exist_nasional = 0;

        /*media lokal*/
        if ($media_lokal <= 0) {
            $count = 0;
        } else if ($media_lokal > 0) {
            for ($a = 0; $a < $media_lokal; $a++) {
                $count_if_exist += 1;
            }
            $count = $count_if_exist;
        }

        //sampai sini oke
        //dd($count);
        //die;

        /*media nasional*/
        if ($media_nasional <= 0) {
            $count_nasional = 0;
        } else if ($media_nasional > 0) {
            for ($b = 0; $b < $media_nasional; $b++) {
                $count_if_exist_nasional += 1;
            }
            $count_nasional = $count_if_exist_nasional;
        }
        //dd($count_nasional);
        //die;

        $databerita = DB::table('berita')->where('id_berita', $id_berita)->first();
        $medialokal_old = $databerita->media_lokal;
        $medianasional_old = $databerita->media_nasional;
        //dd($medianasional_old);
        //die;

        /*media lokal*/
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                $url_gabung[$i] = $request->jumlah_edit[$i];
            }
            //$url_media_lokal_lama = json_decode($medialokal_old=='null'?"[]":$medialokal_old);
            //$url_media_lokal_tosave =  json_encode(array_merge($url_media_lokal_lama,$url_gabung));
            $url_media_lokal_tosave = json_encode($url_gabung);

            //dd($url_media_lokal_tosave);
            //die;
        } else if ($count <= 0) {
            //$url_media_lokal_tosave = [];
            $url_media_lokal_tosave = $medialokal_old;
        }

        /*media nasional*/
        if ($count_nasional > 0) {

            for ($j = 0; $j < $count_nasional; $j++) {

                $url_gabung_nasional[$j] = $request->jumlah_edit_nasional[$j];
            }
            //$url_media_nasional_lama = json_decode($medianasional_old=='null'?"[]":$medianasional_old);
            //$url_media_nasional_tosave =  json_encode(array_merge($url_media_nasional_lama,$url_gabung_nasional));
            $url_media_nasional_tosave = json_encode($url_gabung_nasional);
            //dd($url_media_nasional_tosave);
            //die;
        } else if ($count_nasional <= 0) {
//            $url_media_nasional_tosave = [];
            $url_media_nasional_tosave = $medianasional_old;
        }

        //echo "<pre>";  print_r($url_media_nasional_tosave);
        //die;
        //dd($medialokal_old);
        //dd($medianasional_old);
        //die;

        try {
            $data_to_update = [
                "kode_satker" => $request->kode_satker,
                "tgl_update" => date('Y-m-d'),
                "nama_berita" => $request->judul_berita_satker,
                "facebook" => $request->facebook,
                "website" => $request->website,
                "instagram" => $request->instagram,
                "twitter" => $request->twitter,
                "tiktok" => $request->tiktok,
                "sippn" => $request->sippn,
                "youtube" => $request->youtube,
                "media_lokal" => $url_media_lokal_tosave,
                "media_nasional" => $url_media_nasional_tosave,
                "tgl_update" => date('Y-m-d')
            ];
            $update = DB::table('berita')->where('id_berita', $id_berita)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Diupdate']);
            }


        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }


    }

    public function laporanberita()
    {
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
        $satker = DB::table('satker')->orderBy('kode_satker')->get();
        //$karyawan = DB::table('karyawan')->orderBy('nama_lengkap')->get();
        return view('laporan.laporanberita', compact('namabulan', 'satker'));
    }

    public function getberitabytanggal($kode_satker, Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        dd($kode_satker);
        $presensi = DB::table('presensi')
            ->select('presensi.*', 'nama_lengkap', 'nama_dept')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->join('departemen', 'karyawan.kode_dept', '=', 'departemen.kode_dept')
            ->where('tgl_presensi', $tanggal)
            ->get();

        return view('presensi.getpresensi', compact('presensi'));
    }

    public function gantipassword($kode_satker, Request $request)
    {
        //dd($kode_satker);
        $kd_satker = $kode_satker;
        $satker = DB::table('satker')->where('kode_satker', $kd_satker)->first();
        //dd($satker->kode_satker);
        return view('satker.updateprofile', compact('satker'));
    }

    public function cetaklaporanberita(Request $request)
    {

        //return "woy";
        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember",
        ];
        $dari = $request->dari;
        $explode_dari = explode('-', $dari);
        $tgl_dari = $explode_dari[2];
        $bulan_dari = $explode_dari[1];

        if (substr($bulan_dari, 0, 1) == 0) {
            $bulan_dari = substr($bulan_dari, 1, 1);
        } else if (substr($bulan_dari, 0, 1) == 1) {
            $bulan_dari = substr($bulan_dari, 0, 2);
        }
        //dd($bulan_dari);
        $tahun_dari = $explode_dari[0];
        $tes = substr($bulan_dari, 1, 1);
        /*dodot*/

        //dd($tes);
        //dd($tahun_dari);

        $sampai = $request->sampai;
        $explode_sampai = explode('-', $sampai);
        $tgl_sampai = $explode_sampai[2];
        $bulan_sampai = $explode_sampai[1];

        if (substr($bulan_sampai, 0, 1) == 0) {
            $bulan_sampai = substr($bulan_sampai, 1, 1);
        } else if (substr($bulan_dari, 0, 1) == 1) {
            $bulan_sampai = substr($bulan_sampai, 0, 2);
        }

        //dd($bulan_sampai);
        $tahun_sampai = $explode_sampai[0];
        //return $tahun_sampai;
        $kode_satker = $request->kode_satker;
        $getberita = DB::table('berita')
            ->where('kode_satker', $kode_satker)
            ->whereBetween('tgl_input', [$dari, $sampai])
            ->get();

//        $getberita = DB::select(DB::raw("SELECT * from berita
//where kode_satker='$kode_satker' AND tgl_input between '$dari' and '$sampai'"));
        //dd($getberita);

        /*disnet*/
        $total_website = DB::select(DB::raw("SELECT count(website) as jml_website from berita 
where kode_satker='$kode_satker' and website!='' AND tgl_input between '$dari' and '$sampai'"));
        $total_facebook = DB::select(DB::raw("SELECT count(facebook) as jml_facebook from berita 
where kode_satker='$kode_satker' and facebook!='' AND tgl_input between '$dari' and '$sampai'"));
        //dd($total_facebook[0]->jml_facebook);
        $total_instagram = DB::select(DB::raw("SELECT count(instagram) as jml_instagram from berita 
where kode_satker='$kode_satker' and instagram!='' AND tgl_input between '$dari' and '$sampai'"));
        $total_twitter = DB::select(DB::raw("SELECT count(twitter) as jml_twitter from berita 
where kode_satker='$kode_satker' and twitter!='' AND tgl_input between '$dari' and '$sampai'"));
        $total_tiktok = DB::select(DB::raw("SELECT count(tiktok) as jml_tiktok from berita 
where kode_satker='$kode_satker' and tiktok!='' AND tgl_input between '$dari' and '$sampai'"));
        $total_sippn = DB::select(DB::raw("SELECT count(sippn) as jml_sippn from berita 
where kode_satker='$kode_satker' and sippn!='' AND tgl_input between '$dari' and '$sampai'"));
        $total_youtube = DB::select(DB::raw("SELECT count(youtube) as jml_youtube from berita 
where kode_satker='$kode_satker' and youtube!='' AND tgl_input between '$dari' and '$sampai'"));

        //dd($total_website[0]->jml_website);
        //dd($getberita);
        $satker = DB::table('satker')->where('kode_satker', $kode_satker)->first();
        $satker_name = $satker->name;
        //dd($satker->name);
        //dd($getberita);
//        return $total_website->jml_website;
//        die;

        if ($request->jenis_media == "sosial_media") {
            //return "sosmed"; die;
            if (isset($_POST['exportexcelberita'])) {
                //dd($request);
                $time = date('d-M-Y H:i:s');

                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBerita_$satker_name$time.xls");
                return view('laporan.cetaklaporanberita_excel', compact('getberita',
                    'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                    'satker_name', 'total_website', 'total_facebook', 'total_instagram', 'total_twitter', 'total_tiktok', 'total_sippn',
                    'total_youtube'));
            }

            //return "sosialmedia"; die;
            //return $total_website[0]->jml_website; die;
            return view('laporan.cetaklaporanberita', compact('getberita',
                'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                'satker_name', 'total_website', 'total_facebook', 'total_instagram', 'total_twitter', 'total_tiktok', 'total_sippn',
                'total_youtube'));
        } else if ($request->jenis_media == "media_lokal") {
            /*disnit*/
//            $links_media_lokal = json_decode($databerita->media_lokal);
            //return count($links_media_lokal);
            if (isset($_POST['exportexcelberita'])) {
                //dd($request);
                $time = date('d-M-Y H:i:s');
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBeritaMediaLokal_$satker_name$time.xls");
                return view('laporan.cetaklaporanberita_excel_medialokal', compact('getberita',
                    'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                    'satker_name', 'total_website', 'total_facebook', 'total_instagram', 'total_twitter', 'total_tiktok', 'total_sippn',
                    'total_youtube'));
            }
            return view('laporan.cetaklaporanberita_medialokal', compact('getberita',
                'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                'satker_name'));
        } else if ($request->jenis_media == "media_nasional") {
            if (isset($_POST['exportexcelberita'])) {
                //dd($request);
                $time = date('d-M-Y H:i:s');
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBeritaMediaNasional_$satker_name$time.xls");
                return view('laporan.cetaklaporanberita_excel_medianasional', compact('getberita',
                    'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                    'satker_name', 'total_website', 'total_facebook', 'total_instagram', 'total_twitter', 'total_tiktok', 'total_sippn',
                    'total_youtube'));
            }

            return view('laporan.cetaklaporanberita_medianasional', compact('getberita',
                'namabulan', 'tgl_dari', 'bulan_dari', 'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai',
                'satker_name'));
        }

    }

    public function rekapberita()
    {
        if (auth()->user()->roles == 'humas_satker') {
            abort(403);
        }
        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"];
        $satker = DB::table('satker')->orderBy('kode_satker')->get();
        return view('laporan.laporanberita_rekap', compact('namabulan', 'satker'));
    }

    public function cetaklaporanberita_rekap(Request $request)
    {
        //dd($request);
        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember",
        ];
        $dari = $request->dari;
        $explode_dari = explode('-', $dari);
        $tgl_dari = $explode_dari[2];
        $bulan_dari = $explode_dari[1];
        if (substr($bulan_dari, 0, 1) == 0) {
            $bulan_dari = substr($bulan_dari, 1, 1);
        } else if (substr($bulan_dari, 0, 1) == 1) {
            $bulan_dari = substr($bulan_dari, 0, 2);
        }

        $tahun_dari = $explode_dari[0];
        /*didit*/
        $sampai = $request->sampai;
        $explode_sampai = explode('-', $sampai);
        $tgl_sampai = $explode_sampai[2];
        $bulan_sampai = $explode_sampai[1];

        if (substr($bulan_sampai, 0, 1) == 0) {
            $bulan_sampai = substr($bulan_sampai, 1, 1);
        } else if (substr($bulan_dari, 0, 1) == 1) {
            $bulan_sampai = substr($bulan_sampai, 0, 2);
        }
        $tahun_sampai = $explode_sampai[0];

        $getberita = DB::table('berita')
            ->whereBetween('tgl_input', [$dari, $sampai])
            ->get();
        $satkers = DB::table('satker')->get();
        //dd($satker);
        if ($request->jenis_media == "sosial_media") {
            $query = DB::table('berita')->where('kode_satker', 'SAT-NTB-04')->get();
            //dd($query);
            if (isset($_POST['exportexcelberita_rekap'])) {
                $time = date('d-M-Y H:i:s');
                //dd($time);
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBeritaAll_$time.xls");
                return view('laporan.cetaklaporanberita_rekapexcel', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                    'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
            }
            return view('laporan.cetaklaporanberita_rekap', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
        } else if ($request->jenis_media == "media_lokal") {

            if (isset($_POST['exportexcelberita_rekap'])) {
                $time = date('d-M-Y H:i:s');
                //dd($time);
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBeritaAll_$time.xls");
                return view('laporan.cetaklaporanberita_rekap_medialokalexcel', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                    'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
            }
            return view('laporan.cetaklaporanberita_rekap_medialokal', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
        } else if ($request->jenis_media == "media_nasional") {

            if (isset($_POST['exportexcelberita_rekap'])) {
                $time = date('d-M-Y H:i:s');
                //dd($time);
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=RekapitulasiLinkBeritaAll_$time.xls");
                return view('laporan.cetaklaporanberita_rekap_medianasionalexcel', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                    'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
            }
            return view('laporan.cetaklaporanberita_rekap_medianasional', compact('getberita', 'namabulan', 'tgl_dari', 'bulan_dari',
                'tahun_dari', 'tgl_sampai', 'bulan_sampai', 'tahun_sampai', 'satkers', 'dari', 'sampai'));
        }
    }

    public function konfiglaporanberita(Request $request)
    {

        $query = Konfigurasiberita::query();
        $query->select('*');
        $query->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker');
        $query->where('konfigurasi_berita.jenis_konfig', '=', 'Konfigurasi Berita');

        /*pembatasan akses data tiap role*/
        if (auth()->user()->roles == 'humas_kanwil' || auth()->user()->roles == 'humas_satker') {
            //return "tidak beri akses lihat semua KONFIG BERITA LINK (humas_kanwil)";
            $query->where('konfigurasi_berita.kode_satker', auth()->user()->kode_satker);
        }

        if (!empty($request->kode_satker_search)) {
            $query->where('konfigurasi_berita.kode_satker', $request->kode_satker_search);
        }
        //return $query->get();

        if (!empty($request->nama_konfigurasi_search)) {
            $query->where('name_config', 'like', '%' . $request->nama_konfigurasi_search . '%');
        }

        $query->orderBy('tgl_input');
        //dd($query->get()[0]->tgl_input);
        $konfig = $query->paginate(10);
        $konfig->appends($request->all());

        $satker = DB::table('satker')->orderBy('kode_satker')->get();
        /*contoh belongsTo dari model Konfigurasiberita ke model Satker*/
        //dd($konfig[0]->satker->name);
        return view('konfigurasiberita.index', compact('konfig', 'satker'));
    }

    public function konfigrekapberita(Request $request)
    {
        //return "konfigrekapberita";
        if (auth()->user()->roles == 'humas_satker') {
            abort(403);
        }
        $query = Konfigurasiberita::query();
        $query->select('*');
        $query->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker');
        $query->where('konfigurasi_berita.jenis_konfig', 'Konfigurasi Rekap');

        /*pembatasan akses data tiap role*/
        if (auth()->user()->roles == "humas_kanwil" || auth()->user()->roles == "humas_satker") {
            $query->where('konfigurasi_berita.kode_satker', auth()->user()->kode_satker);
        }
        if (!empty($request->kode_satker_search_rekap)) {
            $query->where('konfigurasi_berita.kode_satker', $request->kode_satker_search_rekap);
            // $query->where('konfigurasi_berita.jenis_konfig','=','Konfigurasi Rekap');
        }

        if (!empty($request->nama_konfigurasi_search_rekap)) {
            $query->where('name_config', 'like', '%' . $request->nama_konfigurasi_search_rekap . '%');
            // $query->where('konfigurasi_berita.jenis_konfig','=','Konfigurasi Rekap');
        }

        $query->orderBy('tgl_input');
        $konfig = $query->paginate(10);
        $konfig->appends($request->all());
        $satker = DB::table('satker')->orderBy('kode_satker')->get();
        return view('konfigurasiberita.index_rekap', compact('konfig', 'satker'));

    }

    public function getkonfig($kode_satker, Request $request)
    {
        //dd($kode_satker);
        //$berita_satker = $query->paginate(10);
        //$berita_satker->appends($request->all());
        $query = DB::table('konfigurasi_berita')->where('kode_satker', $kode_satker);

        if (!empty($request->kode_satker_search)) {
            $query->where('kode_satker', 'like', '%' . $request->kode_satker_search . '%');
        }

        $query->orderBy("tgl_input", "desc");
        $konfig_satker = $query->paginate(10);
        $konfig_satker->appends($request->all());
        $satker = DB::table('satker')->where('kode_satker', $kode_satker)->first();
        return view('konfigurasiberita.index', compact('satker', 'konfig_satker'));
    }

    public function storekonfig(Request $request)
    {
        //dd($request);

        $kode_satker_konfig = $request->kode_satker_konfig;
        $nama_konfigurasi = $request->nama_konfig;
        $salam_pembuka = $request->salam_pembuka;
        $yth = $request->yth;
        $dari_pengirim = $request->dari_pengirim;
        $pengantar = $request->pengantar;
        $jargon = $request->jargon;
        $penutup = $request->penutup;
        $salam_penutup = $request->salam_penutup;
        //dd($salam_penutup);

//        for ($a = 0; $a < count($request->jumlah_tembusan_yth); $a++) {
//            //echo $request->jumlah_tembusan_yth[$a]."<br>";
//        }
//
//        for ($b = 0; $a < count($request->jumlah_hashtag); $b++) {
//            //echo $request->jumlah_tembusan_yth[$a]."<br>";
//        }

//        for ($c = 0; $a < count($request->jumlah_moto); $c++) {
//            //echo $request->jumlah_tembusan_yth[$a]."<br>";
//        }

        $count_if_exist_a = 0;
        $count_if_exist_b = 0;
        $count_if_exist_c = 0;

        /*============================*/
        if (count($request->jumlah_tembusan_yth) <= 0) {
            $count_a = 0;
        } else if (count($request->jumlah_tembusan_yth) > 0) {
            for ($a = 0; $a < count($request->jumlah_tembusan_yth); $a++) {
                $count_if_exist_a += 1;
            }
            $count_a = $count_if_exist_a;
        }

        if ($count_a != 0) {

            for ($i = 0; $i < $count_a; $i++) {
                $url_gabung[$i] = $request->jumlah_tembusan_yth[$i];
            }
        } else {
            $url_gabung = [];
        }
        /*============================*/

        /*============================*/
        if (count($request->jumlah_hashtag) <= 0) {
            $count_b = 0;
        } else if (count($request->jumlah_hashtag) > 0) {
            for ($b = 0; $b < count($request->jumlah_hashtag); $b++) {
                $count_if_exist_b += 1;
            }
            $count_b = $count_if_exist_b;
        }

        if ($count_b != 0) {

            for ($j = 0; $j < $count_b; $j++) {
                $url_gabung_b[$j] = $request->jumlah_hashtag[$j];
            }
        } else {
            $url_gabung_b = [];
        }
        /*============================*/

        /*============================*/
        if (count($request->jumlah_moto) <= 0) {
            $count_c = 0;
        } else if (count($request->jumlah_moto) > 0) {
            for ($c = 0; $c < count($request->jumlah_moto); $c++) {
                $count_if_exist_c += 1;
            }
            $count_c = $count_if_exist_c;
        }

        if ($count_c != 0) {

            for ($k = 0; $k < $count_c; $k++) {
                $url_gabung_c[$k] = $request->jumlah_moto[$k];
            }
        } else {
            $url_gabung_c = [];
        }
        /*============================*/

        try {
            $data = [
                "name_config" => $nama_konfigurasi,
                "kode_satker" => $kode_satker_konfig,
                "salam_pembuka" => $salam_pembuka,
                "yth" => $yth,
                "jumlah_tembusan_yth" => json_encode($url_gabung),
                "dari_pengirim" => $dari_pengirim,
                "pengantar" => $pengantar,
                "jumlah_hashtag" => json_encode($url_gabung_b),
                "jargon" => $jargon,
                "jumlah_moto" => json_encode($url_gabung_c),
                "penutup" => $penutup,
                "salam_penutup" => $salam_penutup,
                "jenis_konfig" => "Konfigurasi Berita",
                "tgl_input" => date('Y-m-d'),
                "tgl_update" => date('Y-m-d'),
            ];
            $simpan = DB::table('konfigurasi_berita')->insert($data);
            if ($simpan) {

                // return redirect('/datasatker/' . $request->kode_satker . '/getberita')->with(['success' => 'Data Berhasil Disimpan']);
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function storekonfig_rekap(Request $request)
    {
        //return $request;
        $kode_satker_konfig = $request->kode_satker_konfig;
        $nama_konfig = $request->nama_konfig;
        $salam_pembuka = $request->salam_pembuka;
        $yth = $request->yth;
        $dari_pengirim = $request->dari_pengirim;
        $pengantar = $request->pengantar;
        $salam_penutup = $request->salam_penutup;
        $ttd_kakanwil = $request->ttd_kakanwil;
        $nama_kakanwil = $request->nama_kakanwil;

        /*============================*/
        $count_if_exist_a = 0;
        if (count($request->jumlah_tembusan_yth) <= 0) {
            $count_a = 0;
        } else if (count($request->jumlah_tembusan_yth) > 0) {
            for ($a = 0; $a < count($request->jumlah_tembusan_yth); $a++) {
                $count_if_exist_a += 1;
            }
            $count_a = $count_if_exist_a;
        }

        if ($count_a != 0) {
            for ($i = 0; $i < $count_a; $i++) {
                $url_gabung[$i] = $request->jumlah_tembusan_yth[$i];
            }
        } else {
            $url_gabung = [];
        }
        /*============================*/
        //return $url_gabung;
        try {
            $data = [
                "name_config" => $nama_konfig,
                "kode_satker" => $kode_satker_konfig,
                "salam_pembuka" => $salam_pembuka,
                "yth" => $yth,
                "jumlah_tembusan_yth" => json_encode($url_gabung),
                "dari_pengirim" => $dari_pengirim,
                "pengantar" => $pengantar,
                "salam_penutup" => $salam_penutup,
                "ttd_kakanwil" => $ttd_kakanwil,
                "nama_kakanwil" => $nama_kakanwil,
                "jenis_konfig" => "Konfigurasi Rekap",
                "tgl_input" => date('Y-m-d'),
                "tgl_update" => date('Y-m-d'),
            ];
            $simpan = DB::table('konfigurasi_berita')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function tampilkandetailkonfig(Request $request)
    {
        $id_konfig = $request->id_konfig;
        //dd($id_konfig);
        $datakonfig = DB::table('konfigurasi_berita')
            ->select("*")
            ->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker')
            ->where('konfigurasi_berita.id_konfig', $id_konfig)
            ->first();

        return view('konfigurasiberita.detail', compact('datakonfig'));
    }

    public function tampilkandetailkonfig_rekap(Request $request)
    {
        $id_konfig = $request->id_konfig;
        $datakonfig = DB::table('konfigurasi_berita')
            ->select("*")
            ->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker')
            ->where('konfigurasi_berita.id_konfig', $id_konfig)
            ->first();
        //return $datakonfig;

        return view('konfigurasiberita.detail_rekap', compact('datakonfig'));
    }

    public function editkonfig(Request $request)
    {
        $id_konfig = $request->id_konfig;
        $konfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $satker = DB::table('satker')->where('kode_satker', $konfig->kode_satker)->first();
        return view('konfigurasiberita.edit', compact('satker', 'konfig'));
    }

    public function editkonfig_rekap(Request $request)
    {
        $id_konfig = $request->id_konfig;
        //return $id_konfig;
        $konfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $satker = DB::table('satker')->where('kode_satker', $konfig->kode_satker)->first();
        //return $satker;
        return view('konfigurasiberita.edit_rekap', compact('satker', 'konfig'));
    }


    public function hapushash(Request $request)
    {
        //return $request->key;
        $hash = $request->hash;
        $key = $request->key;
        $id_konfig = $request->id_konfig;
        $datahashtag = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        //return $datakonfig;
        $hashtags = json_decode($datahashtag->jumlah_hashtag);
        //return $key;

        /*mencari data array yg dihapus dgn parameter value*/
        if (($key = array_search($hash, $hashtags)) !== false) {
            unset($hashtags[$key]);
        }

        try {
            $data_to_update = [
                "jumlah_hashtag" => json_encode(count($hashtags) > 0 ? array_values($hashtags) : null),
                "tgl_update" => date('Y-m-d'),
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Hashtag Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Hashtag Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Hashtag Gagal dihapus']);
        }

    }

    public function hapustembusan_y(Request $request)
    {
        //return $request->key;
        $tembusan_y = $request->tembusan_y;
        $key = $request->key;
        $id_konfig = $request->id_konfig;
        $datatembusan_y = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        //return $datakonfig;
        $tembusans = json_decode($datatembusan_y->jumlah_tembusan_yth);
        //return $key;

        /*mencari data array yg dihapus dgn parameter value*/
        if (($key = array_search($tembusan_y, $tembusans)) !== false) {
            unset($tembusans[$key]);
        }

        try {
            $data_to_update = [
                "jumlah_tembusan_yth" => json_encode(count($tembusans) > 0 ? array_values($tembusans) : null),
                "tgl_update" => date('Y-m-d'),
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Tembusah YTH Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Tembusah YTH Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Tembusah YTH Gagal dihapus']);
        }

    }

    public function hapustembusan_y_rekap(Request $request)
    {
        //return $request;
        //return $request->key;
        $tembusan_y = $request->tembusan_y;
        $key = $request->key;
        $id_konfig = $request->id_konfig;
        $datatembusan_y = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        //return $datakonfig;
        $tembusans = json_decode($datatembusan_y->jumlah_tembusan_yth);
        //return $key;

        /*mencari data array yg dihapus dgn parameter value*/
        if (($key = array_search($tembusan_y, $tembusans)) !== false) {
            unset($tembusans[$key]);
        }

        try {
            $data_to_update = [
                "jumlah_tembusan_yth" => json_encode(count($tembusans) > 0 ? array_values($tembusans) : null),
                "tgl_update" => date('Y-m-d'),
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Tembusah YTH Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Tembusah YTH Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Tembusah YTH Gagal dihapus']);
        }

    }

    public function hapusmoto(Request $request)
    {
        //return $request->key;
        $moto = $request->moto;
        $key = $request->key;
        $id_konfig = $request->id_konfig;
        $datakonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        //return $datakonfig;
        $motos = json_decode($datakonfig->jumlah_moto);
        //return $key;

        /*mencari data array yg dihapus dgn parameter value*/
        if (($key = array_search($moto, $motos)) !== false) {
            unset($motos[$key]);
        }

        try {
            $data_to_update = [
                "jumlah_moto" => json_encode(count($motos) > 0 ? array_values($motos) : null),
                "tgl_update" => date('Y-m-d'),
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_to_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Moto Berhasil dihapus']);
            } else {
                return Redirect::back()->with(['warning' => 'Moto Gagal dihapus']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Moto Gagal dihapus']);
        }

    }

    public function updatekonfig($id_konfig, Request $request)
    {
        //dd($id_konfig);
        /*url_file_tembusan*/
        if ($request->url_files_tembusan != null) {
            $url_files_tembusan = count($request->url_files_tembusan);
        } else if ($request->url_files_tembusan == null) {
            $url_files_tembusan = 0;
        }

        /*url_files_hashtag*/
        if ($request->url_files_hashtag != null) {
            $url_files_hashtag = count($request->url_files_hashtag);
        } else if ($request->url_files_hashtag == null) {
            $url_files_hashtag = 0;
        }

        //return $url_files_hashtag;

        /*url_files_moto*/
        if ($request->url_files_moto != null) {
            $url_files_moto = count($request->url_files_moto);
        } else if ($request->url_files_moto == null) {
            $url_files_moto = 0;
        }

        //return $url_files_moto;

        $count_ifExist_tembusans = 0;
        $count_ifExist_hashtags = 0;
        $count_ifExist_motos = 0;

        /*tembusans*/
        if ($url_files_tembusan <= 0) {
            $count_tembusans = 0;
        } else if ($url_files_tembusan > 0) {
            for ($a = 0; $a < $url_files_tembusan; $a++) {
                $count_ifExist_tembusans += 1;
            }
            $count_tembusans = $count_ifExist_tembusans;
        }

        /*hashtags*/
        if ($url_files_hashtag <= 0) {
            $count_hashtags = 0;
        } else if ($url_files_hashtag > 0) {
            for ($b = 0; $b < $url_files_hashtag; $b++) {
                $count_ifExist_hashtags += 1;
            }
            $count_hashtags = $count_ifExist_hashtags;
        }

        /*motos*/
        if ($url_files_moto <= 0) {
            $count_motos = 0;
        } else if ($url_files_moto > 0) {
            for ($c = 0; $c < $url_files_moto; $c++) {
                $count_ifExist_motos += 1;
            }
            $count_motos = $count_ifExist_motos;
        }

        //$datakonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $datakonfig = DB::table('konfigurasi_berita')
            ->select("*")
            ->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker')
            ->where('konfigurasi_berita.id_konfig', $id_konfig)
            ->first();

        //dd($datakonfig);
        $jumlah_tembusan_yth_old = $datakonfig->jumlah_tembusan_yth;
        $jumlah_hashtag_old = $datakonfig->jumlah_hashtag;
        $jumlah_moto_old = $datakonfig->jumlah_moto;
        //dd($jumlah_tembusan_yth_old);
        //dd($jumlah_hashtag_old);
        //dd($jumlah_tembusan_yth_old);

        /*gabung kolom tembusans*/
        if ($count_tembusans > 0) {
            for ($i = 0; $i < $count_tembusans; $i++) {
                $url_files_tembusan_gabung[$i] = $request->url_files_tembusan[$i];
            }
            $url_files_tembusan_tosave = json_encode($url_files_tembusan_gabung);

        } else if ($count_tembusans <= 0) {
            $url_files_tembusan_tosave = $jumlah_tembusan_yth_old;
        }
        //dd($url_files_tembusan_tosave);

        /*gabung kolom hashtags*/
        if ($count_hashtags > 0) {
            for ($i = 0; $i < $count_hashtags; $i++) {
                $url_files_hashtag_gabung[$i] = $request->url_files_hashtag[$i];
            }
            $url_files_hashtag_tosave = json_encode($url_files_hashtag_gabung);

        } else if ($count_hashtags <= 0) {
            $url_files_hashtag_tosave = $jumlah_hashtag_old;
        }
        //dd($url_files_hashtag_tosave);

        /*gabung kolom moto*/
        if ($count_motos > 0) {
            for ($i = 0; $i < $count_motos; $i++) {
                $url_files_moto_gabung[$i] = $request->url_files_moto[$i];
            }
            $url_files_moto_tosave = json_encode($url_files_moto_gabung);

        } else if ($count_motos <= 0) {
            $url_files_moto_tosave = $jumlah_moto_old;
        }
        //dd($url_files_moto_tosave);
        $kode_satker_edit = $request->kode_satker_edit;
        $nama_konfig_edit = $request->nama_konfig_edit;
        $salam_pembuka_edit = $request->salam_pembuka_edit;
        $yth_edit = $request->yth_edit;
        //$url_files_tembusan_tosave;
        $dari_pengirim_edit = $request->dari_pengirim_edit;
        $pengantar_edit = $request->pengantar_edit;
        //$url_files_hashtag_tosave;
        $jargon_edit = $request->jargon_edit;
        //$url_files_moto_tosave;
        $penutup_edit = $request->penutup_edit;
        $salam_penutup_edit = $request->salam_penutup_edit;
        //dd($salam_penutup_edit);
        try {
            $data_konfig_update = [
                "name_config" => $nama_konfig_edit,
                "salam_pembuka" => $salam_pembuka_edit,
                "yth" => $yth_edit,
                "jumlah_tembusan_yth" => $url_files_tembusan_tosave,
                "dari_pengirim" => $dari_pengirim_edit,
                "pengantar" => $pengantar_edit,
                "jumlah_hashtag" => $url_files_hashtag_tosave,
                "jargon" => $jargon_edit,
                "jumlah_moto" => $url_files_moto_tosave,
                "penutup" => $penutup_edit,
                "salam_penutup" => $salam_penutup_edit,
                "tgl_update" => date('Y-m-d')
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_konfig_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Konfigurasi Berhasil Diupdate']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Konfigurasi Gagal Diupdate']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Konfigurasi Gagal Diupdate']);
        }
    }

    public function updatekonfig_rekap($id_konfig, Request $request)
    {
        //return $id_konfig;
        if ($request->url_files_tembusan != null) {
            $url_files_tembusan = count($request->url_files_tembusan);
        } else if ($request->url_files_tembusan == null) {
            $url_files_tembusan = 0;
        }

        //return $url_files_tembusan;

        $count_ifExist_tembusans = 0;

        /*==========tembusans============*/
        if ($url_files_tembusan <= 0) {
            $count_tembusans = 0;
        } else if ($url_files_tembusan > 0) {
            for ($a = 0; $a < $url_files_tembusan; $a++) {
                $count_ifExist_tembusans += 1;
            }
            $count_tembusans = $count_ifExist_tembusans;
        }
        /*==========tembusans============*/


        //$datakonfig = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->first();
        $datakonfig = DB::table('konfigurasi_berita')
            ->select("*")
            ->join('satker', 'konfigurasi_berita.kode_satker', '=', 'satker.kode_satker')
            ->where('konfigurasi_berita.id_konfig', $id_konfig)
            ->first();

        //dd($datakonfig);
        $jumlah_tembusan_yth_old = $datakonfig->jumlah_tembusan_yth;

        /*gabung kolom tembusans*/
        if ($count_tembusans > 0) {
            for ($i = 0; $i < $count_tembusans; $i++) {
                $url_files_tembusan_gabung[$i] = $request->url_files_tembusan[$i];
            }
            $url_files_tembusan_tosave = json_encode($url_files_tembusan_gabung);

        } else if ($count_tembusans <= 0) {
            $url_files_tembusan_tosave = $jumlah_tembusan_yth_old;
        }

        $kode_satker_edit = $request->kode_satker_edit;
        $nama_konfig_edit = $request->nama_konfig_edit;
        $salam_pembuka_edit = $request->salam_pembuka_edit;
        $yth_edit = $request->yth_edit;
        $dari_pengirim_edit = $request->dari_pengirim_edit;
        $pengantar_edit = $request->pengantar_edit;
        $salam_penutup_edit = $request->salam_penutup_edit;
        $ttd_kakanwil_edit = $request->ttd_kakanwil_edit;
        $nama_kakanwil_edit = $request->nama_kakanwil_edit;
        //return $request;
        try {
            $data_konfig_update = [
                "name_config" => $nama_konfig_edit,
                "salam_pembuka" => $salam_pembuka_edit,
                "yth" => $yth_edit,
                "jumlah_tembusan_yth" => $url_files_tembusan_tosave,
                "dari_pengirim" => $dari_pengirim_edit,
                "pengantar" => $pengantar_edit,
                "salam_penutup" => $salam_penutup_edit,
                "ttd_kakanwil" => $ttd_kakanwil_edit,
                "nama_kakanwil" => $nama_kakanwil_edit,
                "tgl_update" => date('Y-m-d')
            ];
            $update = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->update($data_konfig_update);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Konfigurasi Berhasil Diupdate']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Konfigurasi Gagal Diupdate']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Konfigurasi Gagal Diupdate']);
        }
    }

    public function deletekonfig($id_konfig)
    {
        $delete = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Konfigurasi Berita Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Konfigurasi Berita Gagal Dihapus']);
        }
        //dd($delete[0]->name_config);
    }

    public function deletekonfig_rekap($id_konfig)
    {
        $delete = DB::table('konfigurasi_berita')->where('id_konfig', $id_konfig)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Konfigurasi Berita Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Konfigurasi Berita Gagal Dihapus']);
        }
        //dd($delete[0]->name_config);
    }
}
