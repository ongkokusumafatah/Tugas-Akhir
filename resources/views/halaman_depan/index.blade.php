@extends('template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<style type="text/css">
.fotouser{
    object-fit: cover;
    width: 3rem;
    height: 3rem;
}
.c-primary{
    color: #7571f9;
}
.foto_pengguna{
    object-fit: cover;
    width: 8rem;
    height: 8rem;
}
.tabel-riwayat thead tr th, .tabel-riwayat tbody tr th, .tabel-riwayat tbody tr td{
    font-size: 11px;
}
</style>
@endsection
@section('konten')
<div class="section">
    <div class="section-header">
        <h1>Data Layanan Promo</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Data Layanan Promo</a></div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a type="button" href="{{ route('kelola_posts.create') }}" class="btn font-weight-bold btn-sm mb-4 btn-primary">Tambah Posts</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($posts as $post)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ $no }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->detail !!}</td>
                                    <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('kelola_posts.show', $post->id) }}" class="btn btn-sm btn-primary mr-2">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('kelola_posts.edit', $post->id) }}" class="btn btn-sm btn-primary mr-2">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form method="POST" action="{{ route('kelola_posts.destroy', $post->id) }}">
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

