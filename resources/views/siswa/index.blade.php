@extends('layouts.app')

@section('title')
    Dashboard Siswa
@endsection


@section('content')
   
<div class="row">
 <div class="col-lg-12">
  <div class="card">
                <!-- <div class="card-header">
                  <h4>Halaman Dashboard Auditor</h4>
                </div> -->
                <div class="card-body">
                 <div class="text-center" >
            
                  <h1>Selamat Datang {{$data_siswa->nama}}</h1><br>
                  <h2>Point Kamu : {{$total_point}}</h2>
              
                </div>

                <!--  <button class="btn btn-success fas fa-plus fa-2a"></button> -->
              </div>
            </div>


            <div class="card">
                <!-- <div class="card-header">
                  <h4>Halaman Dashboard Auditor</h4>
                </div> -->
                <div class="card-body">
                 <div class="text-center" >
            
                  <h1>Jadwal Bimbingan Kamu Hari :</h1><br>
                  @if($cek_kelas->kelas == 'VII')
                  <h2>{{$jadwal_kelas_7->dari_hari}} - {{$jadwal_kelas_7->sampai_hari}}</h2>
                   @elseif($cek_kelas->kelas == 'VIII')
                  <h2>{{$jadwal_kelas_8->dari_hari}} - {{$jadwal_kelas_7->sampai_hari}}</h2>
                   @elseif($cek_kelas->kelas == 'IX')
                  <h2>{{$jadwal_kelas_9->dari_hari}} - {{$jadwal_kelas_7->sampai_hari}}</h2>
                  @endif
                </div>

                <!--  <button class="btn btn-success fas fa-plus fa-2a"></button> -->
              </div>
            </div>
          </div>
        </div>


        @endsection


