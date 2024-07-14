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
use File;
use PDF;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //

	public function siswa_dashboard()
	{
		$data_siswa = Siswa::where('id_user',Auth::user()->id)->first();

		$total_point = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->select('pelanggarans.*','siswas.id', 'points.point_pelanggaran')
		->where('siswas.id',$data_siswa->id)
		->orderBy('siswas.id', 'DESC')
		->sum('points.point_pelanggaran');


		$pelanggaran_siswa = DB::table('pelanggarans')
		->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		->join('points', 'pelanggarans.id_point', '=', 'points.id')
		->select('pelanggarans.*','points.nama_pelanggaran','points.kategori_pelanggaran', 'points.point_pelanggaran')
		->where('pelanggarans.id_siswa',$data_siswa->id)
		->orderBy('pelanggarans.id', 'DESC')
		->get();


		// $data_siswa = DB::table('pelanggarans')
		// ->join('siswas', 'pelanggarans.id_siswa', '=', 'siswas.id')
		// ->join('points', 'pelanggarans.id_point', '=', 'points.id')
		// ->select('pelanggarans.*', 'siswas.id_user', 'siswas.nama', 'points.nama_pelanggaran', 'points.kategori_pelanggaran' , 'points.point_pelanggaran'  )
		// ->where('siswas.id_user',Auth::user()->id)
		// ->orderBy('siswas.id', 'DESC')
		// ->get();

		return view('siswa.index',compact('data_siswa','total_point','pelanggaran_siswa'));
	}


	public function siswa_tata_tertib()
	{
		$tata_tertib = TataTertib::orderBy('id','DESC')->get();

		return view('siswa.lihat_tata_tertib',compact('tata_tertib'));
	}


	//FEEDBACK
//==================================================================================================================
	public function feedback()
	{


		$feedback = Feedback::where('id_user_siswa',Auth::user()->id )->get();

		$cek_feedback = Feedback::where('id_user_siswa',Auth::user()->id )->first();

		return view('siswa.feedback.index',compact('feedback','cek_feedback'));
	}


	public function feedback_edit($id)
	{


		$edit_feedback = Feedback::where('id_user_siswa',Auth::user()->id)->where('id', $id)->first();

		$cek_feedback = Feedback::where('id_user_siswa',Auth::user()->id )->first();

		return view('siswa.feedback.update_feedback',compact('edit_feedback','cek_feedback'));
	}

	public function feedback_add (Request $request)
	{


		$data_add = new Feedback();

		$data_add->isi_feedback = $request->input('isi_feedback');
		$data_add->deskripsi = $request->input('deskripsi');
		$data_add->id_user_siswa = Auth::user()->id;
		$data_add->id_user_guru = '6';
		
		$data_add->save();

		return redirect()->back()->with('success', 'feedback Berhasil Ditambahkan');
	}


	public function feedback_update(Request $request, $id)
	{

		$data_update = Feedback::where('id', $id)->first();

		$input = [
			'isi_feedback' => $request->isi_feedback,
			'deskripsi' => $request->deskripsi,
			
		];

		$data_update->update($input);


		return redirect()->route('feedback')->with('success', 'Feedback Kamu Berhasil Diupdate');
	}


	public function feedback_delete($id)
	{


		$delete = Feedback::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}


	// ================================================================================================================================


	//perihal masuk sekolah
	public function siswa_tata_tertib_perihal_masuk_sekolah()
	{
		$masuk_sekolah = Point::orderBy('id','DESC')->where('perihal','Perihal Masuk Sekolah')->get();

		return view('siswa.lihat_tata_tertib.masuk_sekolah',compact('masuk_sekolah'));
	}


	//perihal larangan siswa
	public function siswa_tata_tertib_perihal_larangan_siswa()
	{
		$larangan_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Larangan Siswa')->get();

		return view('siswa.lihat_tata_tertib.larangan_siswa',compact('larangan_siswa'));
	}


	//perihal pakaian seragam siswa
	public function siswa_tata_tertib_perihal_pakaian_seragam_siswa()
	{
		$seragam_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Pakaian Seragam Siswa')->get();

		return view('siswa.lihat_tata_tertib.seragam_siswa',compact('seragam_siswa'));
	}


	//perihal hak siswa
	public function siswa_tata_tertib_perihal_hak_siswa()
	{
		$hak_siswa = Point::orderBy('id','DESC')->where('perihal','Perihal Hak Siswa')->get();

		return view('siswa.lihat_tata_tertib.hak_siswa',compact('hak_siswa'));
	}
}

