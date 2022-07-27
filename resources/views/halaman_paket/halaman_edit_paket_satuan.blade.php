@extends('template')
@section('css')
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Keterangan Paket</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('kelola_paket') }}">Master Data</a></div>
          <div class="breadcrumb-item">Edit Paket satuan</div>
        </div>  
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Paket Satuan</h4>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ url('/update_paket_satuan/' . $id) }}" method="post" name="edit_paket_satuan_form">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-kode-barang">Kode Paket <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-kode-barang" name="kd_barang" readonly="readonly" value="{{ $paket_satus->kd_barang }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-nama">Nama Barang <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-nama" name="nama_barang" placeholder="Masukkan nama barang" value="{{ $paket_satus->nama_barang }}">
                                    <div class="nama_barang_error"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-keterangan">Keterangan Barang <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="val-keterangan" name="ket_barang" placeholder="Masukkan keterangan barang" value="{{ $paket_satus->ket_barang }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">(Ukuran atau lainnya)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-harga">Harga Barang <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="val-harga" name="harga_barang" placeholder="Masukkan harga barang" value="{{ $paket_satus->harga_barang }}">
                                    </div>
                                    <div class="harga_barang_error"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-outlet">Outlet <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-outlet" name="id_outlet">
                                        <option value="" class="outlet_kosong 0_outlet_id">-- Pilih Outlet --</option>
                                        @foreach($outlets as $outlet)
                                        <option value="{{ $outlet->id }}" class="{{ $outlet->id . '_outlet_id' }}">{{ $outlet->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="id_outlet_error"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script type="text/javascript">
var id_outlet = "{{ $paket_satus->id_outlet }}";

$(document).ready(function(){
    $('.'+id_outlet+'_outlet_id').prop('selected', true);
});

@if ($message = Session::get('tidak_tersimpan'))
toastr.warning("{{ $message }}","Peringatan !", {
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
@endif

$(function() {
  $("form[name='edit_paket_satuan_form']").validate({
    rules: {
      nama_barang: "required",
      harga_barang: {
        required: true,
        minlength: 4
      },
      id_outlet: "required"
    },
    messages: {
      nama_barang: "<span style='color: red;'>Nama barang tidak boleh kosong</span>",
      harga_barang: "<span style='color: red;'>Harga barang tidak boleh kosong</span>",
      id_outlet: "<span style='color: red;'>Silakan pilih outlet</span>"
    },
    errorPlacement: function ($error, $element) {
        var name = $element.attr("name");

        $("." + name + "_error").append($error);
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

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

$("#val-harga").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
</script>
@endsection