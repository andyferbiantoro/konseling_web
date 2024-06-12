<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GuruKonseling;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Point;
use App\Models\Pelanggaran;
use File;
use PDF;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruKonselingController extends Controller
{
    //
	public function guru_konseling_dashboard()
	{
		
		return view('guru_konseling.index');
	}

//==================================================================================================================
	public function kelas()
	{
		$kelas = Kelas::orderBy('id','DESC')->get();

		return view('guru_konseling.kelas',compact('kelas'));
	}

	public function kelas_add (Request $request)
	{


		$data_add = new Kelas();

		$data_add->nama_kelas = $request->input('nama_kelas');
		
		$data_add->save();

		return redirect()->back()->with('success', 'Kelas Berhasil Ditambahkan');
	}


	public function kelas_update(Request $request, $id)
	{

		$data_update = kelas::where('id', $id)->first();

		$input = [
			'nama_kelas' => $request->nama_kelas,
			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function kelas_delete($id)
	{


		$delete = Kelas::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}



	//==================================================================================================================
	public function siswa()
	{

		$data_kelas = Kelas::orderBy('id','DESC')->get();

		$siswa = DB::table('siswas')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('siswas.*', 'kelas.nama_kelas')
		->orderBy('siswas.id', 'DESC')
		->get();

		return view('guru_konseling.siswa',compact('siswa','data_kelas'));
	}

	public function siswa_add (Request $request)
	{


		$data_add = new Siswa();

		$data_add->nama = $request->input('nama');
		$data_add->alamat = $request->input('alamat');
		$data_add->id_kelas = $request->input('id_kelas');
		
		$data_add->save();

		return redirect()->back()->with('success', 'Siswa Berhasil Ditambahkan');
	}


	public function siswa_update(Request $request, $id)
	{

		$data_update = Siswa::where('id', $id)->first();

		$input = [
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			// 'id_kelas' => $request->id_kelas,
			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function siswa_delete($id)
	{


		$delete = Siswa::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}


	//==================================================================================================================
	public function pelanggaran()
	{

		$data_kelas = Kelas::orderBy('id','DESC')->get();
	    // $data_siswa = Siswa::orderBy('id','DESC')->get();
		$data_point = Point::orderBy('id','DESC')->get();

		$data_siswa = DB::table('siswas')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('siswas.*', 'kelas.nama_kelas')
		->orderBy('siswas.id', 'DESC')
		->get();

	 //    $pelanggaran = DB::table('pelanggarans')
		// ->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		// ->join('points', 'pelanggarans.id_point', '=', 'points.id')
		// ->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		// ->select('pelanggarans.*', 'siswas.nama','siswas.alamat','kelas.nama_kelas','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran')
		// ->orderBy('pelanggarans.id', 'DESC')
		// ->get();

		return view('guru_konseling.pelanggaran.index',compact('data_kelas','data_siswa','data_point'));
	}

	public function lihat_pelanggaran($id)
	{

		$data_siswa = Siswa::where('id',$id)->get();
		$data_point = point::get();

		$total_point = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->select('pelanggarans.*','siswas.id', 'points.point_pelanggaran')
		->where('siswas.id',$id)
		->orderBy('siswas.id', 'DESC')
		->sum('points.point_pelanggaran');


		$pelanggaran_siswa = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran', 'points.point_pelanggaran')
		->where('pelanggarans.id_siswa',$id)
		->orderBy('pelanggarans.id', 'DESC')
		->get();
		// return $total_point;
		
		return view('guru_konseling.pelanggaran.lihat_pelanggaran',compact('data_siswa','data_point','pelanggaran_siswa','total_point'));
	}



	public function pelanggaran_add (Request $request)
	{


		$data_add = new Pelanggaran();

		$data_add->id_siswa = $request->input('id_siswa');
		$data_add->id_point = $request->input('id_point');
		
		$data_add->save();

		return redirect()->back()->with('success', 'Pelanggaran Berhasil Ditambahkan');
	}



	public function pelanggaran_delete_2(Request $request, $id)
	{

		$data_update = Pelanggaran::where('id', $id)->first();

		$input = [
			'status' => '0',
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function pelanggaran_delete($id)
	{

		$delete = Pelanggaran::findOrFail($id);
		$delete->delete();
		return redirect()->back()->with('success', 'Pelanggaran Berhasil Dihapus');
	}

	public function cetak_surat_peringatan($id)
	{

		$pelanggaran_siswa = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran', 'points.point_pelanggaran')
		->where('pelanggarans.id_siswa',$id)
		->orderBy('siswas.id', 'DESC')
		->get();

//return $sertifikat;
		// view()->share('pelanggaran_siswa', $pelanggaran_siswa);

		// $pdf = PDF::loadview('guru_konseling.pelanggaran.surat_peringatan', ['pelanggaran_siswa' => $pelanggaran_siswa])->setPaper('A4','potrait');

		// return $pdf->stream('surat_peringatan.pdf');

		return view('guru_konseling.pelanggaran.surat_peringatan',compact('pelanggaran_siswa'));

	}
	

	//==================================================================================================================
	public function point()
	{

		$data_point = Point::orderBy('id','DESC')->get();


		return view('guru_konseling.point',compact('data_point'));
	}

	public function point_add (Request $request)
	{


		$data_add = new Point();

		$data_add->nama_pelanggaran = $request->input('nama_pelanggaran');
		$data_add->kategori_pelanggaran = $request->input('kategori_pelanggaran');
		$data_add->point_pelanggaran = $request->input('point_pelanggaran');
		
		$data_add->save();

		return redirect()->back()->with('success', 'point Berhasil Ditambahkan');
	}


	public function point_update(Request $request, $id)
	{

		$data_update = Point::where('id', $id)->first();

		$input = [
			'nama_pelanggaran' => $request->nama_pelanggaran,
			'kategori_pelanggaran' => $request->kategori_pelanggaran,
			'point_pelanggaran' => $request->point_pelanggaran,
			// 'id_kelas' => $request->id_kelas,
			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function point_delete($id)
	{


		$delete = Point::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}
}
