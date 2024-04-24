<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function proseslogin(Request $request){
        //dd($request->nik." - ".$request->password);
        $pass = Hash::make($request->password);
        //dd($pass);

        if(Auth::guard('karyawan')->attempt(['nik'=>$request->nik,'password'=>$request->password])){
            return redirect('/dashboard');
        } else {
            return redirect('/')->with(['warning'=>'Nik / Password Salah!']);
        }
    }

    public function proseslogout(){
        if(Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
            return redirect('/');
        }


    }

    public function proseslogoutadmin(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/panel');
        }

    }
    public function proseslogoutsatker(){
        if(Auth::guard('satker')->check()){
            Auth::guard('satker')->logout();
            return redirect('/panelsatker');
        }

    }






    public function prosesloginadmin(Request $request){
        $pass = Hash::make($request->password);
        //dd($pass);
        //dd($request->email." - ".$request->password);
        if(Auth::guard('user')->attempt(
            [
                'email'=>$request->email,'password'=>$request->password
            ]))
        {
            return redirect('/panel/dashboardadmin');
        } else {
            return redirect('/panel')->with(['warning'=>'Username atau Password Salah!']);
        }
    }



    public function prosesloginsatker(Request $request){
        //dd($request->nik." - ".$request->password);
        $request->validate([
            'kode_satker'=>'required',
            'password'=>'required',
            'g-recaptcha-response'=>'required|captcha'
        ],[
            'kode_satker.required' => 'Anda Belum Mengisi Kode Satker',
            'password.required' => 'Anda Belum Mengisi Password',
            'g-recaptcha-response.required' => 'Verifikasi Captcha ',
        ]);
        $pass = Hash::make($request->password);
        //dd($pass);

        if(Auth::guard('satker')->attempt(['kode_satker'=>$request->kode_satker,'password'=>$request->password,'roles'=>$request->role_user])){
            return redirect('/panelsatker/dashboardsatker');
        } else {
            return redirect('/panelsatker')->with(['warning'=>'Kode Satker / Password Tidak Ditemukan']);
        }
    }
}
