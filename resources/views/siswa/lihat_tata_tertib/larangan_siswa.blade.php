@extends('layouts.app')

@section('title')
Kelola Tata Tertib Larangan Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Tata Tertip Perihal Larangan Siswa</h2><hr>
      
     


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
             
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($larangan_siswa as $data)
            <tr>
              <td>{{$no++}}</td>
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






<!-- Modal Tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Point</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('point_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="nama_pelanggaran">Nama Pelanggaran</label>
          <input type="text" class="form-control" id="nama_pelanggaran" name="nama_pelanggaran"  required=""></input>
        </div>

        <div class="form-group form-success">
          <label>Kategori Pelanggaran</label>
          <select name="kategori_pelanggaran" class="form-control" required="">
            <option selected disabled> -- Pilih Kategori -- </option>
            <option value="Ringan">Ringan</option>
            <option value="Sedang">Sedang</option>
            <option value="Berat">Berat</option>
          </select>
          <span class="form-bar"></span>
        </div>

        

        <div class="form-group">
          <input type="text" class="form-control" id="perihal" name="perihal"  required="" value="Perihal Larangan Siswa"></input>
        </div>


        <div class="form-group">
          <label for="point_pelanggaran">Point Pelanggaran</label>
          <input type="number" class="form-control" id="point_pelanggaran" name="point_pelanggaran"  required=""></input>
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
        <h5 class="modal-title">Anda yakin ingin memperbarui data point ini ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group">
          <label for="nama_pelanggaran">Nama Pelanggaran</label>
          <input type="text" class="form-control" id="nama_pelanggaran_update" name="nama_pelanggaran"  required=""></input>
        </div>

        <div class="form-group form-success">
          <label>Kategori Pelanggaran</label>
          <select name="kategori_pelanggaran" class="form-control" required="">
            <option selected disabled> -- Pilih Kategori -- </option>
            <option value="Ringan">Ringan</option>
            <option value="Sedang">Sedang</option>
            <option value="Berat">Berat</option>
           
          </select>
          <span class="form-bar"></span>
        </div>


        <div class="form-group">
          <label for="point_pelanggaran">Nama Kelas</label>
          <input type="number" class="form-control" id="point_pelanggaran_update" name="point_pelanggaran"  required=""></input>
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data point ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="deleteForm" method="post">

          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data point ini ?</p> <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
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
    var url = '{{route("point_delete", ":id") }}';
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
      $('#nama_pelanggaran_update').val(data[1]);
      $('#point_pelanggaran_update').val(data[3]);
      
      $('#updateInformasiform').attr('action','point_update/'+ data[5]);
      $('#updateInformasi').modal('show');
    });
  });
</script>

@endsection


