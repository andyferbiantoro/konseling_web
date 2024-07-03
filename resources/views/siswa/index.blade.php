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
          </div>
        </div>


        @endsection


