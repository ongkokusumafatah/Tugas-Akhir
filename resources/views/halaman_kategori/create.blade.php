@extends('template')
@section('css')
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Kategori Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('kategori.index') }}">Data Kategori</a></div>
            <div class="breadcrumb-item">Tambah Kategori</div>
        </div>  
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>NAMA KATEGORI</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Kategori" class="form-control">

                            @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                        {{-- <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button> --}}
                    </form>
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