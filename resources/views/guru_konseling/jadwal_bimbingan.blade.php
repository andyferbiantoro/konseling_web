@extends('layouts.app')

@section('title')
Kelola Kelas
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">

    <div class="card-body">
      <h2 class="primary">Data Jadwal Bimbingan</h2><hr>
      <a href="{{ route('siswa') }}"><button class="btn btn-info btn-sm"><i class="fas fa-calendar-week"></i> Kelola Bimbingan Siswa</button></a><br><br>


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
              <th>Kelas</th>
              <th>Mulai Hari -</th>
              <th>- Sampai Hari</th>
              <th>Opsi</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($jadwal_bimbingan as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->kelas}}</td>
              <td>{{$data->dari_hari}}</td>
              <td>{{$data->sampai_hari}}</td>
              <td>
                <button class="btn btn-warning btn-sm icon-file menu-icon edit" title="Edit">Edit Jadwal</button>

                

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
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Kelas</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('jadwal_bimbingan_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}



        <div class="form-group form-success">
          <label>Pilh Kelas</label>
          <select name="kelas" class="form-control" required="">
            <option selected disabled> -- Pilih Kelas -- </option>
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
            <option value="IX">IX</option>
          </select>
          <span class="form-bar"></span>
        </div>


        <div class="form-group form-success">
          <label>Dari Hari</label>
          <select name="dari_hari" class="form-control" required="">
            <option selected disabled> -- Pilih Hari -- </option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
          </select>
          <span class="form-bar"></span>
        </div>


        <div class="form-group form-success">
          <label>Sampai Hari</label>
          <select name="sampai_hari" class="form-control" required="">
            <option selected disabled> -- Pilih Hari -- </option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
          </select>
          <span class="form-bar"></span>
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
        <h5 class="modal-title">Anda yakin ingin memperbarui data Jadwal ini ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        
      <div class="form-group">
                  <input type="hidden" class="form-control" id="kelas_update" name="kelas"  required=""></input>
        </div>



        <div class="form-group form-success">
          <label>Dari Hari</label>
          <select name="dari_hari" class="form-control" required="">
            <option selected disabled> -- Pilih Hari -- </option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
          </select>
          <span class="form-bar"></span>
        </div>


        <div class="form-group form-success">
          <label>Sampai Hari</label>
          <select name="sampai_hari" class="form-control" required="">
            <option selected disabled> -- Pilih Hari -- </option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jum'at">Jum'at</option>
            <option value="Sabtu">Sabtu</option>
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kelas ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">

          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data kelas ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
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
    var url = '{{route("kelas_delete", ":id") }}';
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
      $('#kelas_update').val(data[1]);
      
      $('#updateInformasiform').attr('action','jadwal_bimbingan_update/'+ data[5]);
      $('#updateInformasi').modal('show');
    });
  });
</script>

@endsection


