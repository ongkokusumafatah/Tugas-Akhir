@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<style type="text/css">
.fotouser{
    object-fit: cover;
    width: 3rem;
    height: 3rem;
}
.c-primary{
    color: #7571f9;
}
.foto_pengguna{
    object-fit: cover;
    width: 8rem;
    height: 8rem;
}
.tabel-riwayat thead tr th, .tabel-riwayat tbody tr th, .tabel-riwayat tbody tr td{
    font-size: 11px;
}
</style>
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data Pengguna</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
          <div class="breadcrumb-item">Data Pengguna</div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    	<button type="button" data-count="{{ $outlets }}" class="btn font-weight-bold btn-sm mb-4 btn-primary tambah_pengguna_btn">Tambah Pengguna</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kode Pengguna</th>
                                    <th>Posisi</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1 ?>
                            	@foreach($penggunas as $pengguna)
                                @if($pengguna->role == 'admin' || $pengguna->role == 'kasir')
                                <tr>
                                    <th class="align-middle text-center">{{ $number }}</th>
                                    <th><img src="{{ asset('/pictures/'.$pengguna->avatar) }}" class="rounded-circle mr-3 fotouser" alt="">{{ $pengguna->name }}</th>
                                    <td class="text-center">{{ $pengguna->kd_pengguna }}</td>
                                    <td>
                                        @if($pengguna->role == 'admin')
                                        @else
                                        @endif
                                        &nbsp;{{ $pengguna->role }}</td>
                                    <td>{{ $pengguna->username }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ url('/edit_pengguna/'.$pengguna->id) }}) }}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="{{ url('/hapus_pengguna/'.$pengguna->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $number++ ?>
                                @endif
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
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script type="text/javascript">
$(document).on('click', '.tambah_pengguna_btn', function(e){
    e.preventDefault();
    var cek_count = $(this).attr('data-count');
    if(parseInt(cek_count) != 0)
    {
        window.open("{{ url('/tambah_pengguna') }}","_self");
    }else{
        outlet_kosong();
    }
});

function outlet_kosong(){
    toastr.warning("Silakan buat outlet terlebih dahulu","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-bottom-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
}

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