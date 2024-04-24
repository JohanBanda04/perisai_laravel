<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CabangController extends Controller
{
    public function index(){
        $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        return view('cabang.index',compact('cabang'));
    }

    public function store(Request $request){
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius_cabang = $request->radius_cabang;

        try{
            $data_cbg = [

                'kode_cabang'=>$kode_cabang,
                'nama_cabang'=>$nama_cabang,
                'lokasi_cabang'=>$lokasi_cabang,
                'radius_cabang'=>$radius_cabang,
            ];

            DB::table('cabang')->insert($data_cbg);
            return Redirect::back()->with(['success'=>'Data Cabang Berhasil Disimpan']);
        }catch (\Exception $e){
            return Redirect::back()->with(['warning'=>'Data Cabang Gagal Disimpan']);
        }
    }

    public function edit(Request $request){
        $kode_cabang = $request->kode_cabang;
        $cabang = DB::table('cabang')->where('kode_cabang',$kode_cabang)->first();
        return view('cabang.edit',compact('cabang'));
    }

    public function update(Request $request){
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius_cabang = $request->radius_cabang;

        try{
            $data_cbg = [
                'nama_cabang'=>$nama_cabang,
                'lokasi_cabang'=>$lokasi_cabang,
                'radius_cabang'=>$radius_cabang,
            ];

            DB::table('cabang')
                ->where('kode_cabang',$kode_cabang)
                ->update($data_cbg);
            return Redirect::back()->with(['success'=>'Data Cabang Berhasil Di-Update']);
        }catch (\Exception $e){
            return Redirect::back()->with(['warning'=>'Data Cabang Gagal Di-Update']);
        }
    }

    public function delete($kode_cabang){
        $hapus = DB::table('cabang')->where('kode_cabang',$kode_cabang)->delete();
        if($hapus){
            return Redirect::back()->with(['success'=>'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning'=>'Data Gagal Dihapus']);
        }
    }
}
