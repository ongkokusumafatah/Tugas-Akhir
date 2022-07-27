<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Laundry Campus</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.icon') }}">
    
        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/progressbar_barfiller.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/gijgo.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/animated-headline.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
        <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
        </style>
        <style type="text/css">
            .circle {
            padding: 13px 20px;
            border-radius: 50%;
            background-color: #007bff;
            color: #fff;
            max-height: 50px;
            z-index: 2;
            }

            .how-it-works.row .col-2 {
            align-self: stretch;
            }
            .how-it-works.row .col-2::after {
            content: "";
            position: absolute;
            border-left: 3px solid #007bff;
            z-index: 1;
            }
            .how-it-works.row .col-2.bottom::after {
            height: 50%;
            left: 50%;
            top: 50%;
            }
            .how-it-works.row .col-2.full::after {
            height: 100%;
            left: calc(50% - 3px);
            }
            .how-it-works.row .col-2.top::after {
            height: 50%;
            left: 50%;
            top: 0;
            }
            .timeline div {
            padding: 0;
            height: 40px;
            }
            .timeline hr {
            border-top: 3px solid #007bff;
            margin: 0;
            top: 17px;
            position: relative;
            }
            .timeline .col-2 {
            display: flex;
            overflow: hidden;
            }
            .timeline .corner {
            border: 3px solid #007bff;
            width: 100%;
            position: relative;
            border-radius: 15px;
            }
            .timeline .top-right {
            left: 50%;
            top: -50%;
            }
            .timeline .left-bottom {
            left: -50%;
            top: calc(50% - 3px);
            }
            .timeline .top-left {
            left: -50%;
            top: -50%;
            }
            .timeline .right-bottom {
            left: 50%;
            top: calc(50% - 3px);
            }
        </style>
</head>
<body>
    <header>
        <!-- Header Start -->   
        <div class="header-area">
            <div class="main-header header-sticky">
                <!-- Logo -->
                <div class="header-left">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('landing/img/logo/logo.png') }}" alt=""></a>
                    </div>
                    <div class="menu-wrapper  d-flex align-items-center">
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav> 
                                <ul id="navigation">                                                                                          
                                    <li class="active"><a href="/">Home</a></li>
                                    {{-- <li><a href="about.html">About</a></li> --}}
                                    <li><a href="#services">Prosedur</a></li>
                                    <li><a href="#updates">Updates</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> 
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <section class="slider-area hero-overly">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-9 col-md-10 col-sm-9">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Selamat Datang Di Laundry Campus</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Tugasmu Belajar Bukan Mencuci.</p>
                                </div>
                                <a href="{{ route('login') }}" class="btn hero-btn" style="margin-top: -30px;" data-animation="fadeInLeft" data-delay="0.7s">Login</a>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>

        <!--? Procedur -->
        <section id="services" class="services-area pt-top border-bottom pb-20 mb-60">
            <div class="">
                <div class="container">
                  {{-- <h2 class="pb-3 pt-2 border-bottom mb-5">Vertical Left-Right Timeline</h2> --}}
                    <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <span class="element">Proses Pencucian </span>
                            <h2>Prosedur</h2>
                        </div>
                    </div>
                    </div>
                  <!--first section-->
                  <div class="row align-items-center how-it-works d-flex">
                    <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
                      <div class="circle font-weight-bold">1</div>
                    </div>
                    <div class="col-9">
                      <h3 class="font-weight-bold">Datang Ke Laundry Campus</h3>
                      <p>
                        Pelanggan bisa langsung mendatangi Laundry Campus dengan membawa pakaian yang ingin di Laundry. Kemudian pakaian anda akan ditimbang dahulu untuk mengetahui harga yang anda bayar.
                        Setelah itu melakukan pembayaran.
                      </p>
                    </div>
                  </div>
                  <!--path between 1-2-->
                  <div class="row timeline">
                    <div class="col-2">
                      <div class="corner top-right"></div>
                    </div>
                    <div class="col-8">
                      <hr/>
                    </div>
                    <div class="col-2">
                      <div class="corner left-bottom"></div>
                    </div>
                  </div>
                  <!--second section-->
                  <div class="row align-items-center justify-content-end how-it-works d-flex">
                    <div class="col-9 text-right">
                      <h3 class="font-weight-bold">Pemberian Akun</h3>
                      <p>
                        Setelah melakukan pembayaran, pelanggan akan diberikan Username dan Password lalu Login melalui website kami
                        untuk mendapatkan nota secara online. Untuk selanjutnya username dan password akan selalu digunakan jika 
                        ingin melakukan transaksi berulang. 
                      </p>
                    </div>
                    <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
                      <div class="circle font-weight-bold">2</div>
                    </div>
                  </div>
                  <!--path between 2-3-->
                  <div class="row timeline">
                    <div class="col-2">
                      <div class="corner right-bottom"></div>
                    </div>
                    <div class="col-8">
                      <hr/>
                    </div>
                    <div class="col-2">
                      <div class="corner top-left"></div>
                    </div>
                  </div>
                  <!--third section-->
                  <div class="row align-items-center how-it-works d-flex">
                    <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
                      <div class="circle font-weight-bold">3</div>
                    </div>
                    <div class="col-6">
                      <h3 class="font-weight-bold">Pengecekan Status Laundry</h3>
                      <p>
                        Pada akun anda selain bisa melihat nota, anda juga bisa mengecek proses pencucian pakaian anda apakah sudah dapat diambil atau belum.
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
        </section>
        <!-- Procedur End -->
        
        <!--? Updates Start  -->
        <section id="updates" class="offer-services pb-bottom2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <span class="element">Updates</span>
                            <h2>Layanan Promo</h2>
                        </div>
                    </div>
                    <section id="gallery">
                        <div class="container">
                          <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-lg-4 mb-4">
                                <div class="card">
                                  <img src="{{ Storage::url($post->image) }}" alt="" class="card-img-top">
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{!! $post->detail !!}</p>
                                  </div>
                                 </div>
                                </div>
                            @endforeach
                        </div>
                      </div>
                      </section>
                </div>
                
            </div>
        </section>
        <!-- Offer-services End  -->
        <!--? Services Area Start -->
        {{-- <section id="services" class="services-area pt-top border-bottom pb-20 mb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <span class="element">Proses Pencucian</span>
                            <h2>Cara Kerja</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="{{ asset('landing/img/icon/services-icon1.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Kami Mengumpulkan Pakaian Anda</a></h5>
                                <p>Proses pencucian akan dimulai ketika pakaian anda masuk ke mesin. Hasilnya adalah pakaian yang berkilau!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="{{ asset('landing/img/icon/services-icon2.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Wash your clothes</a></h5>
                                <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="{{ asset('landing/img/icon/services-icon3.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">Get delivery</a></h5>
                                <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Services End -->
        <!--? Offer-services Start  -->
        {{-- <section class="offer-services pb-bottom2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <span class="element">Services</span>
                            <h2>Services we offer</h2>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-offers">
                            <img src="{{ asset('landing/img/gallery/offers1.png') }}" alt="" class=" w-100">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-offers">
                            <img src="{{ asset('landing/img/gallery/offers2.png') }}" alt="" class=" w-100">
                            <div class="offers-caption text-center">
                                <div class="cat-icon">
                                    <img src="{{ asset('landing/img/icon/offers-icon1.png') }}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="services.html">Cloth laundry</a></h5>
                                    <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-offers">
                            <img src="{{ asset('landing/img/gallery/offers2.png') }}" alt="" class=" w-100">
                            <div class="offers-caption text-center">
                                <div class="cat-icon">
                                    <img src="{{ asset('landing/img/icon/offers-icon1.png') }}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="services.html">Cloth ironing</a></h5>
                                    <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-offers">
                            <img src="{{ asset('landing/img/gallery/offers4.png') }}" alt="" class=" w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Offer-services End  -->
        <!--? Want To work -->
        <hr>
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <span class="element">Contact</span>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <section class="wantToWork-area" data-background="{{ asset('landing/img/gallery/section_bg01.png') }}">
                <div class="wants-wrapper w-padding2">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-8 col-lg-9 col-md-7">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Hubungi Kami</h2>
                                <p>Berikan pendapat dan saran untuk kami jika memiliki keluhan dan komplain seputar Laundry Campus Samarinda.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5">
                            <a href="https://wa.me/6285346817176?text=Nama :%0AKritik/Saran :%20" class="btn wantToWork-btn"><img src="{{ asset('landing/img/icon/call2.png') }}" alt="">Contact WA</a>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-8 col-lg-9 col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63834.29149339462!2d117.05688663125002!3d-0.5367946999999971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df681f68d410f79%3A0xed4075fa7c718950!2sCampus%20Laundry%20Samarinda!5e0!3m2!1sid!2sid!4v1657543316301!5m2!1sid!2sid" width="1170" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Jam Kerja</h4>
                                <table>
                                    <tr class="monday fvl-d">
                                        <td><span class="mr-5">Senin</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="tuesday fvl-d">
                                        <td><span>Selasa</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="wednesday fvl-d">
                                        <td><span>Rabu</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="thursday fvl-d">
                                        <td><span>kamis</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="friday fvl-d">
                                        <td><span>Jum'at</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="saturday fvl-d">
                                        <td><span>Sabtu</span></td>
                                        <td>09.00 – 22.00</td>
                                    </tr>
                                    <tr class="sunday fvl-d">
                                        <td><span>Minggu</span></td>
                                        <td>09.00 – 18.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Service</h4>
                                <ul>
                                    <li><a href="#">- Cuci Kering</a></li>
                                    <li><a href="#">- Dry Clean</a></li>
                                    <li><a href="#">- Setrika</a></li>
                                    <li><a href="#">- Cuci Expres</a></li>
                                    <li><a href="#">- Cuci Kiloan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Kontak</h4>
                                <ul>
                                    <li class="number"><a href="#">0822-7698-8888</a></li>
                                    <li><a href="#">laundrycampus@gmail.com</a></li>
                                    <li><a href="#">Jl. Samratulangi No.38, RT.05, Sungai Keledang, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75131</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- footer-bottom area -->
<div class="footer-bottom-area section-bg2" data-background="{{ asset('landing/img/gallery/footer-bg.png') }}">
    <div class="container">
        <div class="footer-border">
           <div class="row d-flex align-items-center">
               <div class="col-xl-12 ">
                   <div class="footer-copy-right text-center">
                       <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Laundry Campus 
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
    <!-- JS here -->
    <script type="text/javascript" src="{{ asset('css/trix.js') }}"></script>
    <script src="{{ asset('./landing/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('./landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('./landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('./landing/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('./landing/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('./landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('./landing/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('./landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('./landing/js/animated.headline.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('./landing/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('./landing/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.sticky.js') }}"></script>
    <!-- Progress -->
    <script src="{{ asset('./landing/js/jquery.barfiller.js') }}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('./landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('./landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('./landing/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('./landing/js/contact.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.form.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('./landing/js/mail-script.js') }}"></script>
    <script src="{{ asset('./landing/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('./landing/js/plugins.js') }}"></script>
    <script src="{{ asset('./landing/js/main.js') }}"></script>

</body>
</html>
