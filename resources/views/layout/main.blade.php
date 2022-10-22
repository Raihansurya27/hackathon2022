<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('/img/logo-icon.png')}}" rel="icon">
  <link href="{{asset('/img/logo-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/css/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('/css/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/css/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.7.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex bg-dark align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 554</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Senin - Sabtu: 11 Pagi - 11 Malam</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">
                <ul>
                    @auth
                    <li class="d-flex align-items-center">Hai, {{ auth()->user()->name }}</li>
                    @empty(auth()->user()->picture)
                    <img src="{{asset('img/noprofile.png')}}" alt="{{auth()->user()->name}}" class="d-flex justify-content-center" style="width: 30px; height: 30px;">
                    @else
                    <img src="{{asset('img/profil/'.auth()->user()->picture)}}" alt="{{auth()->user()->name}}" class="d-flex justify-content-center" style="width: 30px; height: 30px;">
                    @endempty
                    <form action="{{url('/logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-dark">Logout</button>
                    </form>
                    @else
                    <li class="d-flex align-items-center"><a href={{url('/login')}} class="active">Masuk</a></li>
                    <li class="d-flex align-items-center"><a href="{{url('/register')}}">Daftar</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

  @include('layout.header')

  <!-- isi konten -->
  @yield('content')

  <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="text-center">
                        <div class="footer-info">
                            <h3>Rumah Makan Kito Basamo</h3>
                            <p>
                                Pasar Baru <br>
                                Padang, Sumatera Barat<br><br>
                                <strong>Kontak:</strong> +1 5589 55488 554<br>
                                <strong>Email:</strong> butterFly4@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="htttps://www.twitter.com" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="https://www.facebook.com" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Rumah Makan Kito Basamo</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('js/aos/aos.js')}}"></script>
  <script src="{{asset('/js/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/js/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('/js/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('/js/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('/js/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/js/main.js')}}"></script>


</body>

</html>
