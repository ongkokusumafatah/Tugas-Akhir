@extends('template')
@section('css')
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
@if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
<style type="text/css">
    .tabel-ket tr th{
        font-size: 12px;
        padding: 5px;
    }
</style>
@else
<style type="text/css">
    .laundry-gambar{
        object-fit: cover;
        width: 15rem;
        height: 15rem;
        position: absolute;
        margin-top: -50px;
    }
    .profil-pict{
        object-fit: cover;
        width: 7rem;
        height: 7rem;
    }
    .table_profil tr th, .table_profil tr td{
        padding: 5px;
        font-size: 12px;
    }
    .table_profil tr th{
        width: 100px;
    }
    .tabel-outlet tr th, .tabel-outlet tr td{
        padding: 5px;
        font-size: 12px;
    }
    .tabel-paket tr td{
        padding: 3px;
        font-size: 12px;
    }
    .foto{
        position: relative;
    }
    .upload-btn-wrapper button{
      position: absolute;
      background-color: #7571f9;
      color: #fff;
      top: 15%;
      left: 65%;
      transform: translate(-50%, -50%);
      border: 0px;
      border-radius: 50%;
      padding: 6px 0px;
      line-height: 1.42857;
      width: 25px;
      height: 25px;
      font-size: 10px;
    }
    .ubah_foto_input{
      font-size: 100px;
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
    }
</style>
@endif
@endsection
@section('konten')
@if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pegawai</h4>
            </div>
            <div class="card-body">
                {{ $jml_pegawai }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Member</h4>
            </div>
            <div class="card-body">
                {{ $jml_pelanggan }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pesanan Selesai</h4>
            </div>
            <div class="card-body">
                {{ $jml_selesai }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pemasukan Bulan Ini</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pengeluaran Bulan Ini</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>

    </div>
  <!--  -->
</section>
@else
{{-- halaman Dashboard Pelanggan --}}
<div class="section">
    <div class="section-header">
        <h1 class="text-primary">Selamat Datang {{ auth()->user()->name }}!</h1>
    </div>
    <div class="row">
        {{-- Halaman Pelanggan --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" class="form_edit_identitas" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between" style="margin-bottom: -10px;">
                                    <h4>Profil</h4>
                                    <div class="edit-profil-button" style="margin-top: -10px;">
                                        <button type="button" style="border: 0px; background-color: #7571f9;" class="btn btn-sm btn-primary mt-2 edit_identitas_btn"> Edit <i class="fa fa-pencil-alt " aria-hidden="true"></i></button>
                                        <button type="submit" style="border: 0px; background-color: #7571f9;" class="btn btn-sm btn-success mt-2 update_identitas_btn" hidden=""> Simpan <i class="fa fa-bookmark" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <div class="foto">
                                        <img src="{{ asset('/pictures/' . auth()->user()->avatar) }}" class="profil-pict rounded-circle img-thumbnail">
                                        <div class="upload-btn-wrapper ubah_foto_file" hidden="">
                                            <button type="button" class="ubah_foto_btn btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                            <input type="file" name="ubah_foto_input" class="ubah_foto_input" hidden="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="btn btn-sm font-weight-bold mt-1" style="background-color: #6fd96f; color: #fff;">{{ auth()->user()->role }}</div>
                                </div>
                                <table class="table_profil mt-3" style="width: 100%;">
                                    <tr class="align-top">
                                        <th>Kode Pelanggan</th>
                                        <td>:</td>
                                        <td>{{ auth()->user()->kd_pengguna }}</td>
                                    </tr>
                                    <tr class="align-top">
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td class="data_identitas">{{ auth()->user()->name }}</td>
                                        <td class="input_ubah" hidden=""><input required="" type="text" name="ubah_nama_pelanggan" value="{{ auth()->user()->name }}"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <th>Gender</th>
                                        <td>:</td>
                                        @php
                                        $gender = \App\Models\Pelanggan::select('pelanggans.*')
                                        ->where('kd_pelanggan', auth()->user()->kd_pengguna)
                                        ->first();
                                        @endphp
                                        <td>
                                            @if($gender->jk_pelanggan == 'L')
                                            Laki-laki
                                            @else
                                            Perempuan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="align-top">
                                        <th>Email</th>
                                        <td>:</td>
                                        @php
                                        $email = \App\Models\Pelanggan::select('pelanggans.*')
                                        ->where('kd_pelanggan', auth()->user()->kd_pengguna)
                                        ->first();
                                        @endphp
                                        <td class="data_identitas">{{ $email->email_pelanggan }}</td>
                                        <td class="input_ubah" hidden=""><input required="" type="text" name="ubah_email_pelanggan" value="{{ $email->email_pelanggan }}"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <th>No HP</th>
                                        <td>:</td>
                                        @php
                                        $no_hp = \App\Models\Pelanggan::select('pelanggans.*')
                                        ->where('kd_pelanggan', auth()->user()->kd_pengguna)
                                        ->first();
                                        @endphp
                                        <td class="data_identitas">{{ $no_hp->no_hp_pelanggan }}</td>
                                        <td class="input_ubah" hidden=""><input required="" type="text" name="ubah_no_hp_pelanggan" class="number_input" value="{{ $no_hp->no_hp_pelanggan }}"></td>
                                    </tr>
                                    <tr class="align-top">
                                        <th>Alamat</th>
                                        <td>:</td>
                                        @php
                                        $alamat = \App\Models\Pelanggan::select('pelanggans.*')
                                        ->where('kd_pelanggan', auth()->user()->kd_pengguna)
                                        ->first();
                                        @endphp
                                        <td class="data_identitas">{{ $alamat->alamat_pelanggan }}</td>
                                        <td class="input_ubah" hidden="">
                                            <textarea rows="4" id="comment" name="ubah_alamat_pelanggan" style="font-size: 12px;" required="">{{ $alamat->alamat_pelanggan }}</textarea>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Layanan Kami</h4>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <select class="form-control pilih_outlet" name="pilih_outlet">
                                @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}" data-loop="{{ $loop->iteration }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p class="text-dark font-weight-bold" style="font-size: 14px;">Keterangan Outlet</p>
                            <div class="alert alert-danger"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<a href="" target="_blank" class="alert-link alamat_outlet"></a></div>
                        </div>
                        <div class="col-md-12">
                            <table style="width: 50%;" class="tabel-outlet">
                                <tr>
                                    <th class="alert-top">Outlet</th>
                                    <td>:</td>
                                    <td class="nama_outlet"></td>
                                </tr>
                                <tr>
                                    <th class="alert-top">Hotline</th>
                                    <td>:</td>
                                    <td class="hotline_outlet"></td>
                                </tr>
                                <tr>
                                    <th class="alert-top">Email</th>
                                    <td>:</td>
                                    <td class="email_outlet"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p class="text-dark font-weight-bold" style="font-size: 14px;">Paket Laundry</p>
                        </div>
                        <div class="col-md-12">
                            <div class="default-tab">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#paket_kiloan">Paket Kiloan</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#paket_satuan">Paket Satuan</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="paket_kiloan" role="tabpanel">
                                        <div class="list-group paket_kiloan_list">
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="paket_satuan">
                                        <ul class="list-group paket_satuan_list">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Halaman End Pelanggan --}}     
    </div>
</div>
@endif
@endsection
@section('script')
<style url="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></style>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
@if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
<script type="text/javascript">
</script>
@else
<script type="text/javascript">
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$(".number_input").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });

$(document).on('click', '.edit_identitas_btn', function(){
    $(this).prop('hidden', true);
    $('.update_identitas_btn').prop('hidden', false);
    $('.data_identitas').prop('hidden', true);
    $('.input_ubah').prop('hidden', false);
    $('.ubah_foto_file').prop('hidden', false);
});

$('.form_edit_identitas').submit(function(e){
    e.preventDefault();
    var request = new FormData(this);
    $.ajax({
        url: "{{ url('/update_profil_pelanggan') }}",
        method: "POST",
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            if(data == "sukses"){
                swal({
                    title: "Berhasil!",
                    text: "Profil berhasil diubah",
                    type: "success"
                }, function(){
                    window.open("{{ url('/dashboard') }}", "_self");
                });
            }else{
                $('.edit_identitas_btn').prop('hidden', false);
                $('.update_identitas_btn').prop('hidden', true);
                $('.data_identitas').prop('hidden', false);
                $('.input_ubah').prop('hidden', true);
                $('.ubah_foto_file').prop('hidden', true);
            }
        }
    });
});

$(document).on('click', '.ubah_foto_btn', function(e){
    e.preventDefault();
    $('.ubah_foto_input').click();
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.profil-pict').attr('src', e.target.result);
    }   
    reader.readAsDataURL(input.files[0]);
  }
}

$(".ubah_foto_input").change(function() {
  readURL(this);
});

$(document).ready(function(){
    $('.pilih_outlet').change();
});

$(document).on('change', '.pilih_outlet', function() {
    var id = $(this).val();
    $.ajax({
        url: "{{ url('/data_outlet_dashboard') }}/" + id,
        method: "GET",
        success:function(response){
            $('.alamat_outlet').attr('href', 'http://maps.google.com/?q='+response.outlets.alamat);
            $('.alamat_outlet').html(response.outlets.alamat);
            $('.nama_outlet').html(response.outlets.nama);
            $('.hotline_outlet').html(response.outlets.hotline);
            $('.email_outlet').html(response.outlets.email);
            $.ajax({
                url: "{{ url('/outlet_tabel_kiloan') }}/" + id,
                method: "GET",
                success:function(data1){
                    $('.paket_kiloan_list').html(data1);
                    $.ajax({
                        url: "{{ url('/outlet_tabel_satuan') }}/" + id,
                        method: "GET",
                        success:function(data2){
                            $('.paket_satuan_list').html(data2);
                        }
                    });
                }
            });
        }
    })
});
</script>
@endif
@endsection