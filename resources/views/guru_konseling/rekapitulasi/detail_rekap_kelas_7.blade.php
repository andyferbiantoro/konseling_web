@extends('layouts.app')

@section('title')
Kelola Kelas
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Detail Rekapitulasi Pelanggaran Kelas VII</h2><hr>
       <a href="{{ route('rekapitulasi_pelanggaran') }}"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</button></a><br><br>


      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
      <div class="text-center" >
       <div class="table-responsive">
        <table id="dataTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Pelanggaran</th>
              <th>Kategori Pelanggaran</th>
              <th>Point Pelanggaran</th>
             
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($detail_rekap_kelas_7 as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>{{$data->nama_pelanggaran}}</td>
              <td>{{$data->kategori_pelanggaran}}</td>
              <td>{{$data->point_pelanggaran}}</td>
             
                <td style="display: none;">{{$data->id}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!--  <button class="btn btn-success fas fa-plus fa-2a"></button> -->
    </div>
  </div>
</div>
</div>




@endsection
