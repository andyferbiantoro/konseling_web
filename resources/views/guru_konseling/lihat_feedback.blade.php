@extends('layouts.app')

@section('title')
Lihat Feedback Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">

    <div class="card-body">
      <h2 class="primary">Data Feedback Siswa</h2><hr>



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
              <th>Feedback</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($feedback as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nama_kelas}}</td>
              @if($data->isi_feedback == 'Sangat Buruk')
              <td><span class="badge badge-danger">Sangat Buruk</span></td>
              @elseif($data->isi_feedback == 'Buruk')
              <td><span class="badge badge-warning">Buruk</span></td>
              @elseif($data->isi_feedback == 'Cukup Baik')
              <td><span class="badge badge-info">Cukup Baik</span></td>
              @elseif($data->isi_feedback == 'Baik')
              <td><span class="badge badge-primary">Baik</span></td>
              @elseif($data->isi_feedback == 'Sangat Baik')
              <td><span class="badge badge-success">Sangat Baik</span></td>
              @endif

              <td style="display: none;">{{$data->id}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!--  <button class="btn btn-success fas fa-plus fa-2a"></button> -->
  </div>



  <div class="card-body">
    <h2 class="primary">Jumlah Feedback Siswa</h2><hr>
    


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

            <th><br><img src="public/assets/img/sangat_buruk.png" alt="logo" width="50" ><br><br><span class="badge badge-danger">Sangat Buruk</span><br></th>
            <th><br><img src="public/assets/img/buruk.png" alt="logo" width="50" ><br><br><span class="badge badge-warning">Buruk</span></th>
            <th><br><img src="public/assets/img/cukup_baik.png" alt="logo" width="50" ><br><br><span class="badge badge-info">Cukup Baik</span></th>
            <th><br><img src="public/assets/img/baik.png" alt="logo" width="50" ><br><br><span class="badge badge-primary">Baik</span></th>
            <th><br><img src="public/assets/img/sangat_baik.png" alt="logo" width="50" ><br><br><span class="badge badge-success">Sangat Baik</span></th>

            <th style="display: none;">hidden</th>
          </tr>
        </thead>
        <tbody>
          @php $no=1 @endphp
          @foreach($feedback as $data)
          <tr>

            <td>{{$feedback_sangat_buruk}} Siswa</td>
            <td>{{$feedback_buruk}} Siswa</td>
            <td>{{$feedback_cukup_baik}} Siswa</td>
            <td>{{$feedback_baik}} Siswa</td>
            <td>{{$feedback_sangat_baik}} Siswa</td>
            <td style="display: none;">{{$data->id}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


  <div class="table-responsive">
    <div class="table table-striped">
      <tr>
        <th>Jumlah Total Feedback Siswa</th>
        <th>:</th>
        <td><span class="badge badge-dark">{{$total_jumlah_feedback}} Feedback</span></td>
      </tr> 
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
       <form method="post" action="{{route('kelas_add')}}" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="nama_kelas">Nama Kelas</label>
          <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"  required=""></input>
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
        <h5 class="modal-title">Anda yakin ingin memperbarui data kelas ini ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group">
          <label for="nama_kelas">Nama Kelas</label>
          <input type="text" class="form-control" id="nama_kelas_update" name="nama_kelas"  required=""></input>
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
      $('#nama_kelas_update').val(data[1]);
      
      $('#updateInformasiform').attr('action','kelas_update/'+ data[3]);
      $('#updateInformasi').modal('show');
    });
  });
</script>

@endsection


