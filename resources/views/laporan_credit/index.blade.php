@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style type="text/css">
	.fotouser{
	    object-fit: cover;
	    width: 3rem;
	    height: 3rem;
	}
	.c-primary{
	    color: #7571f9;
	}
</style>
@endsection
@section('konten')
<div class="section">
	<div class="section-header">
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
          <div class="breadcrumb-item"><a href="#">Laporan Pengeluaran</a></div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    	<div class="col-md-12">
                    		<h4 class="card-title">Daftar Pengeluaran</h4>
                    	</div>
                    </div>
                    <form action="{{ route('laporan_credit.check') }}" method="GET">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label>TANGGAL AWAL</label>
                                    <input type="text" name="tanggal_awal" value="{{ old('tanggal_awal') }}" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2" style="text-align: center">
                                <label style="margin-top: 38px;">S/D</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>TANGGAL AKHIR</label>
                                    <input type="text" name="tanggal_akhir" value="{{ old('tanggal_kahir') }}" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary mr-1 btn-submit btn-block" type="submit" style="margin-top: 30px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                    </form>
                    @if (isset($credits))
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-chart-area"></i> LAPORAN PENGELUARAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                            <th scope="col">KATEGORI</th>
                                            <th scope="col">NOMINAL</th>
                                            <th scope="col">KETERANGAN</th>
                                            <th scope="col">TANGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($credits as $hasil)
                                            <tr>
                                                <th scope="row" style="text-align: center">{{ $no }}</th>
                                                <td>{{ $hasil->name }}</td>
                                                <td>Rp. {{ number_format($hasil->nominal) }}</td>
                                                <td>{{ $hasil->description }}</td>
                                                <td>{{ $hasil->credit_date }}</td>
                                            </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
