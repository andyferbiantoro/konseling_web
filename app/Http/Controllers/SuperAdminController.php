<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GuruKonseling;
use File;
use PDF;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SuperAdminController extends Controller
{
    //
    public function superadmin_dashboard()
	{
		$guru = GuruKonseling::orderBy('id','DESC')->get();

		return view('superadmin.index',compact('guru'));
	}


	 public function superadmin_guru_konseling()
	{
		$guru = GuruKonseling::orderBy('id','DESC')->get();

		return view('superadmin.kelola_guru_konseling',compact('guru'));
	}


	//tambah guru
	public function superadmin_guru_add(Request $request)
	{

		$cek_nip = GuruKonseling::where('nip', $request->nip)->first();
		

		if ($cek_nip ) {
			return redirect()->back()->with('error', 'Tambah Guru Gagal, NIP Sudah terdaftar');
		
		}else{
			$data = ([
				'email' => $request['email'],
				'username' => $request['username'],
				'password' => Hash::make($request['password']),
				'role' => 'guru_konseling',
			]);


			$lastid = User::create($data)->id;
		}


		$data_add = new GuruKonseling();
		$data_add->id_user = $lastid;
		$data_add->nama = $request->input('nama');
		$data_add->nip = $request->input('nip');
		$data_add->status_kepegawaian = $request->input('status_kepegawaian');

		$data_add->save();

		return redirect()->back()->with('success', 'Guru Berhasil Ditambahkan');
	}


	public function superadmin_guru_update(Request $request, $id)
	{

		$data_update = GuruKonseling::where('id', $id)->first();

		$input = [
			'nama' => $request->nama,
			'nip' => $request->nip,
			'status_kepegawaian' => $request->status_kepegawaian,
			

		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function superadmin_guru_delete($id)
	{


		$cekguru = GuruKonseling::where('id', $id)->first();

		$delete_user_admin = User::where('id', $cekguru->id_user)->first();
		$delete_user_admin->delete();

		$delete = GuruKonseling::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}

}
