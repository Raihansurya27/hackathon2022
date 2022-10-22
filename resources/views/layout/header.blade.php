<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="{{url('/home')}}">Rumah Makan Kito Basamo</a></h1>
  <!-- Uncomment below if you prefer to use an image logo -->
  <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="asset/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="{{url('/home')}}">Beranda</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#about')}}">Tentang</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#menu')}}">Menu</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#specials')}}">Staff</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#events')}}">Acara</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#testimonials')}}">Testimoni</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#book-a-table')}}">Booking Meja</a></li>
                <li><a class="nav-link scrollto" href="{{url('/home#contact')}}">Kontak</a></li>
                @auth
                    @if (auth()->user()->peran->nama == 'Admin')
                    <li><a class="nav-link scrollto" href="{{('/dashboard')}}">Dashboard</a></li>
                    @endif
                @endauth

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Booking Meja</a>

    </div>
</header><!-- End Header -->
