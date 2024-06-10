@extends('layouts.app')

@section('title')
Kelola Guru Konseling
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Guru Konseling</h2><hr>
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalTambah">
        Tambah Guru Konseling
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
              <th>Nama</th>
              <th>NIP</th>
              <th>Status Kepegawaian</th>
              <th>Opsi</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($guru as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nip}}</td>
              <td>{{$data->status_kepegawaian}}</td>
              <td>
                <button class="btn btn-warning btn-sm icon-file menu-icon edit" title="Edit">Edit</button>

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
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Admin</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('superadmin_guru_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama"  required=""></input>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email"  required=""></input>
        </div>

         <div class="form-group">
          <label for="username">username</label>
          <input type="text" class="form-control" id="username" name="username"  required=""></input>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password"  required=""></input>
        </div>

        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="number" class="form-control" id="nip" name="nip"  required=""></input>
        </div>

        <div class="form-group">
          <label for="status_kepegawaian">Status Kepegawaian</label>
          <input type="text" class="form-control" id="status_kepegawaian" name="status_kepegawaian"  required=""></input>
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
        <h5 class="modal-title">Anda yakin ingin memperbarui data admin ini ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama_update" name="nama"  required=""></input>
        </div>

        <div class="form-group">
          <label for="nip">nip</label>
          <input type="text" class="form-control" id="nip_update" name="nip"  required=""></input>
        </div>

        <div class="form-group">
          <label for="status_kepegawaian">Status Kepegawaian</label>
          <input type="text" class="form-control" id="status_kepegawaian_update" name="status_kepegawaian"  required=""></input>
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">

          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data Guru ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
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
    var url = '{{route("superadmin_guru_delete", ":id") }}';
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
      $('#nip_update').val(data[2]);
      $('#status_kepegawaian_update').val(data[3]);
      
      $('#updateInformasiform').attr('action','superadmin_guru_update/'+ data[5]);
      $('#updateInformasi').modal('show');
    });
  });
</script>

@endsection


