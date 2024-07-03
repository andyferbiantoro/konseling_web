@extends('layouts.app')

@section('title')
Perbarui Feedback
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">

    <div class="card-body">
      
      <h2 class="primary">Ubah Penilaian Pada Guru Konseling</h2><hr>

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

       
        <div class="container">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
              <img src="public/assets/img/sangat_buruk.png" alt="logo" width="50" ><br><br>
              <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#sangat_buruk_modal">
                Sangat Buruk
              </button>
            </div>

            <div class="col-sm-2">
              <img src="public/assets/img/buruk.png" alt="logo" width="50" ><br><br>
              <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#buruk_modal">
                Buruk
              </button>
            </div>

            <div class="col-sm-2">
              <img src="public/assets/img/cukup_baik.png" alt="logo" width="50" ><br><br>
              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#cukup_baik_modal">
                Cukup Baik
              </button>
            </div>

            <div class="col-sm-2">
              <img src="public/assets/img/baik.png" alt="logo" width="50" ><br><br>
              <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#baik_modal">
                Baik
              </button>
            </div>

            <div class="col-sm-2">
              <img src="public/assets/img/sangat_baik.png" alt="logo" width="50" ><br><br>
              <button type="button" class="btn btn-success " data-toggle="modal" data-target="#sangat_baik_modal">
                Sangat Baik
              </button>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
      



      </div>

      <!--  <button class="btn btn-success fas fa-plus fa-2a"></button> -->
    </div>
  </div>
</div>
</div>






<!-- Modal Penilaian -->
<div class="modal fade" id="sangat_buruk_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Kamu Akan Menilai Sangat Buruk ?</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('feedback_update',$cek_feedback->id)}}" enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group">
          <input type="hidden" class="form-control" id="isi_feedback" name="isi_feedback"  required="" value="Sangat Buruk"></input>
        </div>

        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Berikan Penilaian</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </form>
  </div>
</div>
</div>



<!-- Modal Penilaian -->
<div class="modal fade" id="buruk_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Kamu Akan Menilai Buruk ?</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('feedback_update',$cek_feedback->id)}}" enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group">
          <input type="hidden" class="form-control" id="isi_feedback" name="isi_feedback"  required="" value="Buruk"></input>
        </div>

        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Berikan Penilaian</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </form>
  </div>
</div>
</div>



<!-- Modal Penilaian -->
<div class="modal fade" id="cukup_baik_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Kamu Akan Menilai Cukup Baik ?</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('feedback_update',$cek_feedback->id)}}" enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group">
          <input type="hidden" class="form-control" id="isi_feedback" name="isi_feedback"  required="" value="Cukup Baik"></input>
        </div>

        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Berikan Penilaian</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </form>
  </div>
</div>
</div>



<!-- Modal Penilaian -->
<div class="modal fade" id="baik_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Kamu Akan Menilai Baik ?</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('feedback_update',$cek_feedback->id)}}" enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group">
          <input type="hidden" class="form-control" id="isi_feedback" name="isi_feedback"  required="" value="Baik"></input>
        </div>

        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Berikan Penilaian</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </form>
  </div>
</div>
</div>



<!-- Modal Penilaian -->
<div class="modal fade" id="sangat_baik_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Kamu Akan Menilai Sangat Baik ?</h5>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('feedback_update',$cek_feedback->id)}}" enctype="multipart/form-data">

        {{csrf_field()}}


        <div class="form-group">
          <input type="hidden" class="form-control" id="isi_feedback" name="isi_feedback"  required="" value="Sangat Baik"></input>
        </div>

        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="Submit">Berikan Penilaian</button>
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


