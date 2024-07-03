@extends('layouts.app')

@section('title')
Lihat Tata Tertib
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    
    <div class="card-body">
      <h2 class="primary">Tata Tertib Sekolah</h2><hr>
      <br><br>

      <div class="text-center" >
       <div class="table-responsive">
        <table id="dataTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Tata Tertib</th>
             
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($tata_tertib as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->tata_tertib}}</td>
             

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

