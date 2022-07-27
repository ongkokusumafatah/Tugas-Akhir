<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title class="none">Laundry Campus</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
    </style>
    @yield('css')
</head>
<body>
    {{-- header --}}
    <div id="main-wrapper">
        <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            </form>
            <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img src="{{ asset('/pictures/' . auth()->user()->avatar ) }}" class="rounded-circle mr-1" alt="imgae">  
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
                    <a href="{{ url('/kelola_profil') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                  @endif
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>                   
                </div>
            </li>
            </ul>
      </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}">Campus Laundry</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('dashboard') }}">CL</a>
              </div>
              <ul class="sidebar-menu">
                <li class="menu-header ">Dashboard</li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="fas fa-fire"></i> <span>Dashboard</span></a>
                </li>
                {{-- Master Data --}}
                @if(auth()->user()->role == 'admin')
                <li class="menu-header">Master Data</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{ route('kelola_pengguna') }}">Data Pengguna</a></li>
                      <li><a class="nav-link" href="{{ route('kelola_outlet') }}">Data Outlet</a></li>
                      <li><a class="nav-link" href="{{ route('kelola_paket') }}">Data Paket</a></li>
                    </ul>
                </li>
                @endif
                {{-- Master Data --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
                <!-- Layanan Jasa -->
                <li class="menu-header">Layanan Jasa</li>
                <li class="nav-item dropdown">
                    <a href="javascript:void()" class="nav-link has-dropdown"><i class="fa fa-shopping-cart"></i> <span>Layanan Jasa</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{ route('registrasi_pelanggan') }}">Registrasi Pelanggan</a></li>
                      <li><a class="nav-link" href="{{ route('kelola_pelanggan') }}">Data Pelanggan</a></li>
                      <li><a class="nav-link" href="{{ route('kelola_transaksi') }}">Transaksi</a></li>
                    </ul>
                </li>
                <!-- Layanan jasa -->
                <li class="menu-header">Inventory</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i> <span>Pengeluaran</span></a>
                    <ul class="dropdown-menu" aria-expanded="false">
                      <li><a class="nav-link" href="{{ url('/kategori') }}">Kategori</a></li>
                      <li><a class="nav-link" href="{{ url('/uang_keluar') }}">Uang Keluar</a></li>
                    </ul>
                </li>
                <!-- Laporan -->
                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Laporan</span></a>
                    <ul class="dropdown-menu" aria-expanded="false">
                      <li><a class="nav-link" href="{{ route('laporan_pegawai') }}">Laporan Pegawai</a></li>
                      <li><a class="nav-link" href="{{ route('laporan_transaksi') }}">Laporan Transaksi</a></li>
                      <li><a class="nav-link" href="{{ route('laporan_credit') }}">Laporan Pengeluaran</a></li>
                    </ul>
                </li>
                <!-- Laporan -->
                @endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-header ">Layanan Promo</li> 
                <li class="nav-item">
                    <a class="nav-link mb-5" href="{{ url('/kelola_posts') }}" aria-expanded="false">
                    <i class="fas fa-fire"></i> <span>MyPost</span></a>
                </li>
                @endif
                @if(auth()->user()->role == 'member' || auth()->user()->role == 'non_member')
                  <li class="menu-header">Pesanan</li>
                    <li class="nav-item">
                        <a href="{{ url('pesanan_saya') }}" class="nav-link" aria-expanded="false">
                            <i class="fa fa-shopping-cart menu-icon"></i><span class="nav-text">Pesanan Saya</span>
                        </a>
                    </li>
                </ul>
                @endif
            </aside>
          </div>
        <div class="main-content">
            @yield('konten')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <span>Copyright &copy; Campus Laundry 2022</span>
            </div>
            <div class="footer-right">
              2.3.0
            </div>
          </footer>
    </div>
    <!-- General JS Scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <!-- Template JS File -->
    <script type="text/javascript" src="{{ asset('css/trix.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('plugins/datamaps/datamaps.world.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    
<script type="text/javascript"> 
        $(document).ready(function(){
            $( document ).on( 'focus', ':input', function(){
                $( this ).attr( 'autocomplete', 'off' );
            });
        });

        (function($) {
            "use strict"

            new quixSettings({
                sidebarPosition: "fixed"
            });
            
        })(jQuery);
    </script>
    @yield('script')
</body>

</html>