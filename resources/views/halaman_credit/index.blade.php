@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Uang Keluar</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    	<a type="button" href="{{ route('uang_keluar.create') }}" class="btn font-weight-bold btn-sm mb-4 btn-primary">Tambah Pengeluaran</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">KATEGORI</th>
                                    <th scope="col">NOMINAL</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($credits as $hasil)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ $no }}</th>
                                    <td>{{ $hasil->name }}</td>
                                    <td>Rp. {{ number_format($hasil->nominal) }}</td>
                                    {{-- <td>{{ $hasil->nominal }}</td> --}}
                                    <td>{{ $hasil->description }}</td>
                                    <td>{{ $hasil->credit_date }}</td>
                                    
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('uang_keluar.edit', $hasil->id) }}" class="btn btn-sm btn-primary mr-2">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form method="POST" action="{{ route('uang_keluar.destroy', $hasil->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++ ?>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
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

    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Apakah Kamu Yakin?`,
              text: "Ingin Menghapus Data Ini.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>
@endsection