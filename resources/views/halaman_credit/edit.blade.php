@extends('template')
@section('css')
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
  <div class="section-header">
    <h1>Edit Pengeluaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('uang_keluar.index') }}">Data Uang Keluar</a></div>
      <div class="breadcrumb-item">Edit Uang Keluar</div>
    </div>  
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('uang_keluar.update', $uang_keluar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NOMINAL (Rp.)</label>
                                <input type="text" name="nominal" value="{{ old('nominal', $uang_keluar->nominal) }}" placeholder="Masukkan Nominal" class="form-control currency">

                                @error('nominal')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>TANGGAL</label>
                                <input type="text" class="form-control datetimepicker" name="credit_date" value="{{ old('credit_date', $uang_keluar->credit_date) }}" placeholder="Pilih Tanggal">

                                @error('date_debit')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KATEGORI</label>
                                <select class="form-control select2" name="category_id" style="width: 100%">
                                    <option value="">-- PILIH KATEGORI --</option>
                                    @foreach ($categories as $hasil)
                                        @if($uang_keluar->category_id == $hasil->id)
                                            <option value="{{ $hasil->id }}" selected> {{ $hasil->name }}</option>
                                        @else
                                            <option value="{{ $hasil->id }}"> {{ $hasil->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('category_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>KETERANGAN</label>
                                <textarea class="form-control" name="description" rows="6" placeholder="Masukkan Keterangan">{{ old('description', $uang_keluar->description) }}</textarea>

                                @error('description')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var cleaveC = new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
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