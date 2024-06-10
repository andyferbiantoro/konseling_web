@extends('layouts.app')

@section('title')
Kelola Pelanggaran Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Data Pelanggaran Siswa</h2><hr>
     <!--  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i>
        Tambah Data Pelanggaran
      </button> -->
      <br><br>


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
              <th>Alamat Siswa</th>
              <th>Kelas</th>
              <th>Opsi</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($data_siswa as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->alamat}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>
               

                <a href="{{route('lihat_pelanggaran',$data->id)}}"><button class="btn btn-warning btn-sm"><i class="fas fa-exclamation-circle"></i> Lihat Pelanggaran</button></a>
                  
                </td>



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






<!-- Modal Tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Pelanggaran Siswa</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('siswa_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        

        <div class="form-group form-success">
          <label>Pilh Kelas</label>
          <select name="id_kelas" class="form-control" required="">
            <option selected disabled> -- Pilih Kelas -- </option>
            @foreach($data_kelas as $data)
            <option value="{{$data->id}}">{{$data->nama_kelas}}</option>
            @endforeach
          </select>
          <span class="form-bar"></span>
        </div>

         <div class="form-group form-success">
          <label>Pilh Siswa</label>
          <select name="id_siswa" class="form-control" required="">
            <option selected disabled> -- Pilih Siswa -- </option>
            @foreach($data_siswa as $data)
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
          <span class="form-bar"></span>
        </div>


         <div class="form-group form-success">
          <label>Pilh Pelanggaran</label>
          <select name="id_point" class="form-control" required="">
            <option selected disabled> -- Pilih Pelanggaran -- </option>
            @foreach($data_point as $data)
            <option value="{{$data->id}}">{{$data->nama_pelanggaran}}</option>
            @endforeach
          </select>
          <span class="form-bar"></span>
        </div>




        <div class="form-group">
          <input type="hidden" class="form-control" id="role" name="role"  required="" value="Admin Kasir"></input>
        </div>

        


      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Tambahkan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </form>
  </div>
</div>
</div>




@endsection

@section('scripts')

@endsection


