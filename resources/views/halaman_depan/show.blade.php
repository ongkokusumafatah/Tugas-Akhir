@extends('template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Lihat Layanan Promo</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('kelola_posts.index') }}">Data Layanan Promo</a></div>
            <div class="breadcrumb-item">Lihat Data Layanan</div>
        </div>  
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                <p clas>{{ $post->title }}</p>
                                <div class="font-weight-bold"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Deskripsi:</strong>
                                {{ $post->detail }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <img src="{{ '/storage/' .$post->image }}" width="500px">
                                {{-- <img src="public/image{{ $post->image }}" width="500px"> --}}
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