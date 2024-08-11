@extends('layouts.app')

@section('title')
Kelola Kelas
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card" >

    <div class="card-body">
      <h2 class="primary">Rekapitulasi Pelanggaran Siswa</h2><hr>
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
      <div class="col-lg-10">
        <form action="{{route('rekapitulasi_pelanggaran')}}" method="GET">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-row">
                <label>Mulai Tanggal</label>
                <input type="date" class="form-control" name="from" placeholder="Cari tanggal .." value="{{ old('from') }}">
              </div>
            </div>

            <div class="col-lg-3">
             <div class="form-row">
              <label>Sampai Tanggal</label>
              <input type="date" class="form-control" name="to" placeholder="Cari tanggal .." value="{{ old('to') }}">
            </div>
          </div>

          <div class="col-lg-2">
            <label></label>
            <input type="submit" class="btn btn-primary" value="Filter Tanggal">
          </div>
        </div> 
      </form>
      <br>
      @if($from == null && $to == null)
      <div class="row">
        <div class="col-lg-12"><p style="color: red" class="text-center"><span class="badge badge-danger">Tanggal Tidak Difilter</span></p></div>
      </div><br>
      @endif
      @if($from != null && $to != null)
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3"><span class="badge badge-info">Mulai tanggal : {{date("j F Y", strtotime($from))}}</span></div>
        <div class="col-lg-3"><span class="badge badge-info">Sampai tanggal : {{date("j F Y", strtotime($to))}}</span></div>
        <div class="col-lg-3"></div>
      </div><br><br>
      @endif
    </div>
      <hr>
    <div class="text-center" >
      <div class="table-responsive">
        <h4><span class="badge badge-success">Kelas VII, Jumlah Pelanggaran : {{$jml_rekap_kelas_7}} Siswa</span></h4>
        <table id="dataTable" class="table table-striped" style="width:100%">
          <thead>
             <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Pelanggaran</th>
              <th>Kategori Pelanggaran</th>
              <th>Point Pelanggaran</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
           @foreach($detail_rekap_kelas_7 as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nama_kelas}}</td>
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
  </div>
</div>




  <div class="card">
    <div class="card-body">
    </div>
    <div class="text-center" >
      <div class="table-responsive">
        <h4><span class="badge badge-warning">Kelas VIII, Jumlah Pelanggaran : {{$jml_rekap_kelas_8}} Siswa</span></h4>
        <table id="dataTable2" class="table table-striped" style="width:100%">
         <thead>
             <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Pelanggaran</th>
              <th>Kategori Pelanggaran</th>
              <th>Point Pelanggaran</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
           @foreach($detail_rekap_kelas_8 as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>{{$data->nama_pelanggaran}}</td>
              <td>{{$data->kategori_pelanggaran}}</td>
              <td>{{$data->point_pelanggaran}}</td>
             
                <td style="display: none;">{{$data->id}}</td>
              </tr>
              @endforeach

          </tbody>
        </table>
        </table>
      </div>
    </div>
  </div>




  <div class="card">
    <div class="card-body">
    </div>
    <div class="text-center" >
      <div class="table-responsive">
        <h4><span class="badge badge-danger">Kelas IX, Jumlah Pelanggaran : {{$jml_rekap_kelas_9}} Siswa</span></h4>
        <table id="dataTable3" class="table table-striped" style="width:100%">
          <thead>
             <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Pelanggaran</th>
              <th>Kategori Pelanggaran</th>
              <th>Point Pelanggaran</th>
              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
           @foreach($detail_rekap_kelas_9 as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>{{$data->nama_pelanggaran}}</td>
              <td>{{$data->kategori_pelanggaran}}</td>
              <td>{{$data->point_pelanggaran}}</td>
             
                <td style="display: none;">{{$data->id}}</td>
              </tr>
              @endforeach

          </tbody>
        </table>
        </table>
      </div>
    </div>
  </div>



</div>
</div>
</div>





@endsection



