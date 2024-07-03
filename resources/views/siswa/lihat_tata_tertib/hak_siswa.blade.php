@extends('layouts.app')

@section('title')
Kelola Tata Tertib Hak Siswa
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Tata Tertip Perihal Hak Siswa</h2><hr>
      
    


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
              <th>Hak Siswa</th>
 
            
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($hak_siswa as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama_pelanggaran}}</td>
            
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


