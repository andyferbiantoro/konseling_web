@extends('layouts.app')

@section('title')
Kelola Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Data Siswa</h2><hr>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i>
        Tambah Siswa
      </button><br><br>


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
              <th>Nomor Induk Siswa</th>
              <th>Alamat Siswa</th>
              <th>Kelas</th>
              <th>Opsi</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($siswa as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nis}}</td>
              <td>{{$data->alamat}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>
                <button class="btn btn-warning btn-sm icon-file menu-icon edit" title="Edit">Edit</button>

                <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                  <button class="btn btn-danger btn-sm"  title="Hapus">Hapus</button>

                   <a href="{{route('bimbingan_siswa',$data->id)}}"><button class="btn btn-info btn-sm"><i class="fas fa-exclamation-circle"></i> Lihat bimbingan</button></a>
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
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Siswa</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('siswa_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="nama">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" name="nama"  required=""></input>
        </div>

        <div class="form-group">
          <label for="nis">Nomor Induk Siswa</label>
          <input type="text" class="form-control" id="nis" name="nis"  required=""></input>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat Siswa</label>
          <input type="text" class="form-control" id="alamat" name="alamat"  required=""></input>
        </div>

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
          <label for="nis">Nomor Induk Siswa</label>
          <input type="text" class="form-control" id="nis_update" name="nis"  required=""></input>
        </div>

        <div class="form-group">
          <label for="alamat">Nama Kelas</label>
          <input type="text" class="form-control" id="alamat_update" name="alamat"  required=""></input>
        </div>

     
        <div class="form-group form-success">
          <label >Kelas</label>
          <select  name="id_kelas" class="form-control" >
            @foreach($data_kelas as $k)
            <option value="{{$k->id}}" {{$data->id_kelas == $k->id ? "selected" : "" }} >{{$k->nama_kelas}}</option>
            @endforeach
          </select>
          <span class="form-bar"></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data siswa ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">

          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data siswa ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
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
    var url = '{{route("siswa_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>


<script>
  $(document).ready(function() {
    var table = $('#dataTable').DataTable();
    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);
      $('#nama_update').val(data[1]);
      $('#nis_update').val(data[2]);
      $('#alamat_update').val(data[3]);
      $('#updateInformasiform').attr('action','siswa_update/'+ data[6]);
      $('#updateInformasi').modal('show');
    });
  });
</script>

@endsection


