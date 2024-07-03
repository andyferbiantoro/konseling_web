<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function login()
	{

		return view('auth.login');
	}


	public function proses_login(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
        //akan ingat selama 5 tahun jika tidak logout

        //auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya, ditambah $ingat jika pengen ingat
        if(auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $ingat)){
            //auth->user() untuk memanggil data user yang sudah login
        if(auth()->user()->role == "superadmin"){
            return redirect()->route('superadmin_dashboard')->with('success', 'Anda Berhasil Login');
        }else if(auth()->user()->role == "guru_konseling"){
            return redirect()->route('guru_konseling_dashboard')->with('success', 'Anda Berhasil Login');
        }else if(auth()->user()->role == "siswa"){
            return redirect()->route('siswa_dashboard')->with('success', 'Anda Berhasil Login');
        }

    }else{
       
            return redirect()->route('login')->with('error', 'Email / Password anda salah'); //route itu isinya name dari route di web.php

        }
    }


    public function superadmin_logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }

    public function guru_konseling_logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }


    public function siswa_logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }
}
