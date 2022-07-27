@extends('template')
@section('css')
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
  <div class="section-header">
    <h1>Edit Pengeluaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('kategori.index') }}">Data Kategori</a></div>
      <div class="breadcrumb-item">Edit Kategori</div>
  </div>  
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>NAMA KATEGORI</label>
                    <input type="text" name="name" value="{{ old('name', $kategori->name) }}" placeholder="Masukkan Nama Kategori" class="form-control">
                    @error('name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                {{-- <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button> --}}
            </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script type="text/javascript">
  var timeoutHandler = null;

/**
 * btn submit loader
 */
$( ".btn-submit" ).click(function()
{
    $( ".btn-submit" ).addClass('btn-progress');
    if (timeoutHandler) clearTimeout(timeoutHandler);

    timeoutHandler = setTimeout(function()
    {
        $( ".btn-submit" ).removeClass('btn-progress');

    }, 1000);
});

/**
 * btn reset loader
 */
$( ".btn-reset" ).click(function()
{
    $( ".btn-reset" ).addClass('btn-progress');
    if (timeoutHandler) clearTimeout(timeoutHandler);

    timeoutHandler = setTimeout(function()
    {
        $( ".btn-reset" ).removeClass('btn-progress');

    }, 500);
})
</script>
@endsection