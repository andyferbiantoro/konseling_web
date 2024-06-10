@extends('layouts.app')

@section('title')
Lihat Pelanggaran Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      @foreach($data_siswa as $nama)
      <h2 class="primary">Lihat Pelanggaran {{$nama->nama}}, Total Point : {{$total_point}}</h2><hr>
      @endforeach
      <a href="{{ route('pelanggaran') }}"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</button></a>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i>
        Tambah Pelanggaran
      </button>
      @if($total_point >= 50)
      <a href="{{ route('pelanggaran') }}"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-file"></i> Cetak Surat Peringatan</button></a>
      @endif
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
              <th>Nama Pelanggaran</th>
              <th>Kategori Pelanggaran</th>
              <th>Point Pelanggaran</th>
              <th>Opsi</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($pelanggaran_siswa as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama_pelanggaran}}</td>
              <td>{{$data->kategori_pelanggaran}}</td>
              <td>{{$data->point_pelanggaran}}</td>
              <td>
               <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                  <button class="btn btn-danger btn-sm"  title="Hapus">Hapus</button>
                  
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
       <form method="post" action="{{route('pelanggaran_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        
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

        @foreach($data_siswa as $siswa)
         <div class="form-group">
          <input type="hidden" class="form-control" id="id_siswa_update" name="id_siswa"  required="" value="{{$siswa->id}}"></input>
        </div>
        @endforeach
        




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





<!-- Modal Update -->
<div id="updateInformasi" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!--Modal content-->
    
   <form action="" id="updateInformasiform" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin ingin memperbarui data siswa ini ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group">
          <label for="nama">Nama Siswa</label>
          <input type="text" class="form-control" id="nama_update" name="nama"  required=""></input>
        </div>

        <div class="form-group">
          <label for="alamat">Nama Kelas</label>
          <input type="text" class="form-control" id="alamat_update" name="alamat"  required=""></input>
        </div>

        
      </div> 
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary float-right mr-2" >Perbarui</button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </form>
 
</div>
</div>




<!-- Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pelanggaran ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">

          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data pelanggaran ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
          <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>

        </form>
      </div>

    </div>
  </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{route("pelanggaran_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>


@endsection


