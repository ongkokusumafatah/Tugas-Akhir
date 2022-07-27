@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<style type="text/css">
.video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
}
.video-container iframe,  .video-container object,  .video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.c-primary{
    color: #7571f9;
}
</style>
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data Outlet</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
          <div class="breadcrumb-item">Data Outlet</div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    	<a href="{{ route('tambah_outlet') }}" class="btn mb-4 font-weight-bold btn-sm btn-primary">Tambah Outlet</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Outlet</th>
                                    <th>Hotline</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($outlets as $outlet)
                            	<tr>
                                 <th class="align-middle text-center">{{ $loop->iteration }}</th>
                                 <th class="align-middle">{{ $outlet->nama }}</th>
                                 <td>{{ $outlet->hotline }}</td>
                                 <td>{{ $outlet->email }}</td>
                                 <td>{{ $outlet->alamat }}</td>
                                 <td class="d-flex justify-content-center">
                                    <a href="{{ url('/edit_outlet/'.$outlet->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="{{ url('/hapus_outlet/'.$outlet->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
@if ($message = Session::get('tersimpan'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif

@if ($message = Session::get('terhapus'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif

@if ($message = Session::get('terubah'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif
</script>
@endsection