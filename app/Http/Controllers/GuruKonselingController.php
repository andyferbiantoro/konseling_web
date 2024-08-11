<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GuruKonseling;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Point;
use App\Models\Pelanggaran;
use App\Models\TataTertib;
use App\Models\Feedback;
use App\Models\JadwalBimbingan;
use App\Models\BimbinganSiswa;
use File;
use PDF;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class GuruKonselingController extends Controller
{
    //
	public function guru_konseling_dashboard()
	{
		
		return view('guru_konseling.index');
	}

//KELAS
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
		$data_add->kelas = $request->input('kelas');
		
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


	//SISWA
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

	// 


	public function siswa_add(Request $request)
	{

		$cek_nis = Siswa::where('nis', $request->nis)->first();
		

		if ($cek_nis ) {
			return redirect()->back()->with('error', 'Tambah Sisa Gagal, Nomor Induk Siswa Sudah terdaftar');

		}else{
			$data = ([
				
				'username' => $request['nis'],
				'password' => Hash::make('123456'),
				'role' => 'siswa',
			]);


			$lastid = User::create($data)->id;
		}


		$data_add = new Siswa();
		$data_add->id_user = $lastid;
		$data_add->nama = $request->input('nama');
		$data_add->nis = $request->input('nis');
		$data_add->alamat = $request->input('alamat');
		$data_add->id_kelas = $request->input('id_kelas');

		$data_add->save();

		$update_jumlah_siswa = Kelas::where('id', $data_add->id_kelas)->first();

		$input = [
			'jumlah_siswa' => $update_jumlah_siswa->jumlah_siswa + 1,
				
		];

		$update_jumlah_siswa->update($input);


		return redirect()->back()->with('success', 'Siswa Berhasil Ditambahkan');
	}



	public function siswa_update(Request $request, $id)
	{

		$data_update = Siswa::where('id', $id)->first();

		$input = [
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'nis' => $request->nis,
			// 'id_kelas' => $request->id_kelas,	
		];

		$data_update->update($input);


		$update_username = User::where('id', $data_update->id_user)->first();

		$input = [
			'username' => $data_update->nis,

		];

		$update_username->update($input);



		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function siswa_delete($id)
	{
		$get_siswa = Siswa::where('id', $id)->first();

		$update_jumlah_siswa = Kelas::where('id', $get_siswa->id_kelas)->first();

		$input = [
			'jumlah_siswa' => $update_jumlah_siswa->jumlah_siswa - 1,
				
		];

		$update_jumlah_siswa->update($input);

		$delete_user_siswa = User::where('id', $get_siswa->id_user)->first();
		$delete_user_siswa->delete();

		$delete_pelanggaran = Pelanggaran::where('id_siswa', $get_siswa->id)->get();
		foreach ($delete_pelanggaran as $key) {
			$key->delete();
		}

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

		
		$data_siswa = DB::table('siswas')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('siswas.*','kelas.kelas')
		->where('siswas.id',$id)
		->get();
		// return $data_siswa;

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
		$data_add->kelas = $request->input('kelas');
		
		$data_add->save();

		return redirect()->back()->with('success', 'Pelanggaran Berhasil Ditambahkan');
	}



	// public function pelanggaran_delete_2(Request $request, $id)
	// {

	// 	$data_update = Pelanggaran::where('id', $id)->first();

	// 	$input = [
	// 		'status' => '0',
	// 	];

	// 	$data_update->update($input);


	// 	return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	// }


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
		$data_add->perihal = $request->input('perihal');
		
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


	//==================================================================================================================
	//perihal masuk sekolah
	public function tata_tertib_perihal_masuk_sekolah()
	{
		$masuk_sekolah = Point::orderBy('id','DESC')->where('perihal','Perihal Masuk Sekolah')->get();

		return view('guru_konseling.tata_tertib.masuk_sekolah',compact('masuk_sekolah'));
	}


	//perihal larangan siswa
	public function tata_tertib_perihal_larangan_siswa()
	{
		$larangan_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Larangan Siswa')->get();

		return view('guru_konseling.tata_tertib.larangan_siswa',compact('larangan_siswa'));
	}


	//perihal pakaian seragam siswa
	public function tata_tertib_perihal_pakaian_seragam_siswa()
	{
		$seragam_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Pakaian Seragam Siswa')->get();

		return view('guru_konseling.tata_tertib.seragam_siswa',compact('seragam_siswa'));
	}


	//perihal hak siswa
	public function tata_tertib_perihal_hak_siswa()
	{
		$hak_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Hak Siswa')->get();

		return view('guru_konseling.tata_tertib.hak_siswa',compact('hak_siswa'));
	}



	public function tata_tertib_add (Request $request)
	{


		$data_add = new TataTertib();

		$data_add->tata_tertib = $request->input('tata_tertib');
		
		$data_add->save();

		return redirect()->back()->with('success', 'tata_tertib Berhasil Ditambahkan');
	}


	public function tata_tertib_update(Request $request, $id)
	{

		$data_update = TataTertib::where('id', $id)->first();

		$input = [
			'tata_tertib' => $request->tata_tertib,
			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function tata_tertib_delete($id)
	{


		$delete = TataTertib::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}



//JADWAL BIMBINGAN
//==================================================================================================================
	public function bimbingan_siswa($id)
	{
		//$bimbingan_siswa = BimbinganSiswa::where('id', $id)->orderBy('id','DESC')->get();
		$bimbingan_siswa = DB::table('bimbingan_siswas')
		->join('siswas', 'bimbingan_siswas.id_siswa', '=', 'siswas.id')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('bimbingan_siswas.*','siswas.nama','kelas.nama_kelas',)
		->where('bimbingan_siswas.id_siswa',$id)
		->orderBy('bimbingan_siswas.id', 'DESC')
		->get();


		$get_data_siswa = Siswa::where('id',$id)->first();

		return view('guru_konseling.bimbingan_siswa.index',compact('bimbingan_siswa','get_data_siswa'));
	}

	public function bimbingan_siswa_add (Request $request)
	{


		$data_add = new BimbinganSiswa();

		$data_add->isi_bimbingan = $request->input('isi_bimbingan');
		$data_add->id_siswa = $request->input('id_siswa');

		
		$data_add->save();

		return redirect()->back()->with('success', 'bimbingan_siswa Berhasil Ditambahkan');
	}


	public function bimbingan_siswa_update(Request $request, $id)
	{

		$data_update = BimbinganSiswa::where('id', $id)->first();

		$input = [
			'isi_bimbingan' => $request->isi_bimbingan,
			
			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function bimbingan_siswa_delete($id)
	{


		$delete = BimbinganSiswa::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}



//BIMBINGAN SISWA
//==================================================================================================================
	public function jadwal_bimbingan()
	{
		$jadwal_bimbingan = JadwalBimbingan::orderBy('id','ASC')->get();

		return view('guru_konseling.jadwal_bimbingan',compact('jadwal_bimbingan'));
	}

	public function jadwal_bimbingan_add (Request $request)
	{


		$data_add = new JadwalBimbingan();

		$data_add->kelas = $request->input('kelas');
		$data_add->dari_hari = $request->input('dari_hari');
		$data_add->sampai_hari = $request->input('sampai_hari');
		
		$data_add->save();

		return redirect()->back()->with('success', 'jadwal_bimbingan Berhasil Ditambahkan');
	}


	public function jadwal_bimbingan_update(Request $request, $id)
	{

		$data_update = JadwalBimbingan::where('id', $id)->first();

		$input = [
			'kelas' => $request->kelas,
			'dari_hari' => $request->dari_hari,
			'sampai_hari' => $request->sampai_hari,

			
		];

		$data_update->update($input);


		return redirect()->back()->with('success', 'Data Berhasil Diupdate');
	}


	public function jadwal_bimbingan_delete($id)
	{


		$delete = JadwalBimbingan::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}


// FEEDBACK
	// ===============================================================================================================================


	public function lihat_feedback()
	{


		$feedback = DB::table('feedback')
		->join('siswas', 'feedback.id_user_siswa', '=', 'siswas.id_user')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('feedback.*', 'siswas.nama','kelas.nama_kelas')
		->orderBy('feedback.id', 'DESC')
		->get();

		$feedback_sangat_buruk = Feedback::where('isi_feedback','Sangat Buruk')->count();
		$feedback_buruk = Feedback::where('isi_feedback','Buruk')->count();
		$feedback_cukup_baik = Feedback::where('isi_feedback','Cukup Baik')->count();
		$feedback_baik = Feedback::where('isi_feedback','Baik')->count();
		$feedback_sangat_baik = Feedback::where('isi_feedback','Sangat Baik')->count();

		$total_jumlah_feedback = Feedback::count();
		return view('guru_konseling.lihat_feedback',compact('feedback','feedback_sangat_buruk','feedback_buruk','feedback_cukup_baik','feedback_baik','feedback_sangat_baik','total_jumlah_feedback'));
	}


	// REKAPITULASI PELANGGARAN
	// =================================================================================================================

	public function rekapitulasi_pelanggaran(Request $request)
	{

		$from = $request->from;
		$to = $request->to;

		if ($from == null && $to == null) {
			$jml_rekap_kelas_7 = Pelanggaran::where('kelas','VII')->count();
			$jml_rekap_kelas_8 = Pelanggaran::where('kelas','VIII')->count();
			$jml_rekap_kelas_9 = Pelanggaran::where('kelas','IX')->count();

			$detail_rekap_kelas_7 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'VII')
			->orderBy('pelanggarans.id', 'DESC')
			->get();

			$detail_rekap_kelas_8 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'VIII')
			->orderBy('pelanggarans.id', 'DESC')
			->get();

			$detail_rekap_kelas_9 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'IX')
			->orderBy('pelanggarans.id', 'DESC')
			->get();
		}else{
			$jml_rekap_kelas_7 = Pelanggaran::where('kelas','VII')->whereBetween('updated_at', [$from, $to])->count();
			$jml_rekap_kelas_8 = Pelanggaran::where('kelas','VIII')->whereBetween('updated_at', [$from, $to])->count();
			$jml_rekap_kelas_9 = Pelanggaran::where('kelas','IX')->whereBetween('updated_at', [$from, $to])->count();

			$detail_rekap_kelas_7 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'VII')
			->whereBetween('pelanggarans.updated_at', [$from, $to])
			->orderBy('pelanggarans.id', 'DESC')
			->get();

			$detail_rekap_kelas_8 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'VIII')
			->whereBetween('pelanggarans.updated_at', [$from, $to])
			->orderBy('pelanggarans.id', 'DESC')
			->get();

			$detail_rekap_kelas_9 = DB::table('pelanggarans')
			->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
			->join('points', 'pelanggarans.id_point', '=', 'points.id')
			->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
			->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
			->where('kelas.kelas', 'IX')
			->whereBetween('pelanggarans.updated_at', [$from, $to])
			->orderBy('pelanggarans.id', 'DESC')
			->get();
		}
		

		// 	return $rekap_kelas_7;


		return view('guru_konseling.rekapitulasi.index',compact('from','to','jml_rekap_kelas_7','jml_rekap_kelas_8','jml_rekap_kelas_9','detail_rekap_kelas_7','detail_rekap_kelas_8','detail_rekap_kelas_9'));
	}


	public function detail_rekap_kelas_7()
	{

		$detail_rekap_kelas_7 = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
		->where('kelas.kelas', 'VII')
		->orderBy('pelanggarans.id', 'DESC')
		->get();

	// return $detail_rekap_kelas_7;	

		return view('guru_konseling.rekapitulasi.detail_rekap_kelas_7',compact('detail_rekap_kelas_7'));
	}


	public function detail_rekap_kelas_8()
	{

		$detail_rekap_kelas_8 = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
		->where('kelas.kelas', 'VIII')
		->orderBy('pelanggarans.id', 'DESC')
		->get();

	// return $detail_rekap_kelas_8;	

		return view('guru_konseling.rekapitulasi.detail_rekap_kelas_8',compact('detail_rekap_kelas_8'));
	}


	public function detail_rekap_kelas_9()
	{

		$detail_rekap_kelas_9 = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran','points.point_pelanggaran','siswas.nama','kelas.nama_kelas')
		->where('kelas.kelas', 'IX')
		->orderBy('pelanggarans.id', 'DESC')
		->get();

	// return $detail_rekap_kelas_7;	

		return view('guru_konseling.rekapitulasi.detail_rekap_kelas_9',compact('detail_rekap_kelas_9'));
	}
}
