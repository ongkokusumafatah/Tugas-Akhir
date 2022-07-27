@extends('template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Tambah Layanan Promo</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('kelola_posts.index') }}">Data Layanan Promo</a></div>
            <div class="breadcrumb-item">Tambah Data Layanan</div>
        </div>  
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('kelola_posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-title">Title <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" id="val-title" name="title" placeholder="Masukkan title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Deskripsi <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-7">
                                    @error('detail')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <input id="detail" type="hidden" name="detail" value="{{ old('detail') }}">
                                    <trix-editor input="detail"></trix-editor>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Image <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input avatar-input" name="image" id="customFile">
                                        @error('image')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                      <label class="custom-file-label" for="customFile">Pilih Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
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
@endsection

<script type="text/javascript">
    document.addEventListener('trix-file-accept', function(e)) {
        e.preventDefault();
    }
</script>


