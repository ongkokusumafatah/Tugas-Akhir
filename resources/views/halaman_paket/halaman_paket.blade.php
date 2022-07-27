@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<style type="text/css">
.c-primary{
    color: #7571f9;
}
</style>
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Keterangan Paket</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
          <div class="breadcrumb-item">Data Paket</div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"><a class="nav-link paket_kiloan_tab active" data-toggle="tab" href="#paket_kiloan">Paket Kiloan</a>
                            </li>
                            <li class="nav-item"><a class="nav-link paket_satuan_tab" data-toggle="tab" href="#paket_satuan">Paket Satuan</a>
                            </li>
                        </ul>
                    {{---------------------------------------PAKET KILOAN----------------------------- --}}
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="paket_kiloan" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card" style="background-color: #f4f3f9;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Daftar Paket Kiloan</h4>
                                                    <button type="button" class="btn mb-4 btn-primary font-weight-bold btn-sm tambah_kiloan_btn" data-count="{{ $outlets }}">Tambah Paket</button>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered zero-configuration">
                                                        <thead style="text-align: center;">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Paket</th>
                                                                <th>Nama Paket</th>
                                                                <th>Harga</th>
                                                                <th>Lama Cuci</th>
                                                                <th>Minimal Berat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($paket_kilos as $paket_kilo)
                                                            <tr>
                                                                <th class="align-middle text-center">{{ $loop->iteration }}</th>
                                                                <th class="align-middle text-center">{{ $paket_kilo->kd_paket }}</th>
                                                                <td>{{ $paket_kilo->nama_paket }}</td>
                                                                <td>Rp. {{ number_format($paket_kilo->harga_paket,2,',','.') }}</td>
                                                                <td>{{ $paket_kilo->hari_paket }} Hari</td>
                                                                <td>{{ $paket_kilo->min_berat_paket }} Kg</td>
                                                                <td class="d-flex justify-content-center">
                                                                    <a href="{{ url('/edit_paket_kiloan/'.$paket_kilo->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pencil-alt"></i></a>
                                                                    <a href="{{ url('/hapus_paket_kiloan/'.$paket_kilo->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                    {{---------------------------------------END PAKET KILOAN----------------------------- --}}

                    {{--------------------------------------- PAKET SATUAN----------------------------- --}}
                            <div class="tab-pane fade" id="paket_satuan">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card" style="background-color: #f4f3f9;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Daftar Paket Satuan</h4>
                                                    <button type="button" class="btn mb-4 btn-primary font-weight-bold btn-sm tambah_satuan_btn" data-count="{{ $outlets }}">Tambah Paket</button>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered zero-configuration">
                                                        <thead style="text-align: center;">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Keterangan Barang</th>
                                                                <th>Harga</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($paket_satus as $paket_satu)
                                                            <tr>
                                                                <th class="align-middle text-center">{{ $loop->iteration }}</th>
                                                                <th class="align-middle text-center">{{ $paket_satu->kd_barang }}</th>
                                                                <td>{{ $paket_satu->nama_barang }}</td>
                                                                <td>{{ $paket_satu->ket_barang }}</td>
                                                                <td>Rp. {{ number_format($paket_satu->harga_barang,2,',','.') }}</td>
                                                                <td class="d-flex justify-content-center">
                                                                    <a href="{{ url('/edit_paket_satuan/'.$paket_satu->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pencil-alt"></i></a>
                                                                    <a href="{{ url('/hapus_paket_satuan/'.$paket_satu->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                        </div>
                    </div>
                    {{---------------------------------------END PAKET SATUAN----------------------------- --}}
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


$(document).on('click', '.tambah_kiloan_btn', function(e){
    e.preventDefault();
    var cek_count = $(this).attr('data-count');
    if(parseInt(cek_count) != 0)
    {
        window.open("{{ route('/kelola_paket/tambah_paket_kiloan') }}","_self");
    }else{
        outlet_kosong();
    }
});

$(document).on('click', '.tambah_satuan_btn', function(e){
    e.preventDefault();
    var cek_count = $(this).attr('data-count');
    if(parseInt(cek_count) != 0)
    {
        window.open("{{ route('/kelola_paket/tambah_paket_satuan') }}","_self");
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
    })
}

@if ($message = Session::get('tersimpan'))
var simpan = "{{ $message }}";
if(simpan == "kiloan")
{
    swal(
        "Berhasil!",
        "Paket kiloan baru berhasil ditambahkan",
        "success"
    );
}
else if(simpan == "satuan")
{
    swal(
        "Berhasil!",
        "Paket satuan baru berhasil ditambahkan",
        "success"
    );
    $('.paket_satuan_tab').click();
}
@endif

@if ($message = Session::get('terhapus'))
var hapus = "{{ $message }}";
if(hapus == "kiloan")
{
    swal(
        "Berhasil!",
        "Paket kiloan berhasil dihapus",
        "success"
    );
}
else if(hapus == "satuan")
{
    swal(
        "Berhasil!",
        "Paket satuan berhasil dihapus",
        "success"
    );
    $('.paket_satuan_tab').click();
}
@endif

@if ($message = Session::get('terubah'))
var ubah = "{{ $message }}";
if(ubah == "kiloan")
{
    swal(
        "Berhasil!",
        "Paket kiloan berhasil diubah",
        "success"
    );
}
else if(ubah == "satuan")
{
    swal(
        "Berhasil!",
        "Paket satuan berhasil diubah",
        "success"
    );
    $('.paket_satuan_tab').click();
}
@endif
</script>
@endsection