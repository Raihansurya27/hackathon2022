@extends('layout.main')
@section('title','Beranda - Restoran Istimewa')
@section('content')
  <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Selamat Datang di <span>Restoran Istimewa</span></h1>
                <h2>Telah menyajikan makanan dan acara yang luar biasa selama 20 tahun lebih!</h2>

                <div class="btns">
                    <a href="#menu" class="btn-menu animated fadeInUp scrollto">Menu Kami</a>
                    <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Pesan Meja</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="about-img">
                        <img src="{{asset('/img/about.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Restoran indah dan mewah.</h3>
                    <p class="fst-italic">
                        Didirikan pada tahun 2020. mengapa anda harus memilih restoran ini? Karena
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Berlokasi ditempat stategis.</li>
                        <li><i class="bi bi-check-circle"></i> Dibuat oleh koki hebat.</li>
                        <li><i class="bi bi-check-circle"></i> Dengan bahan lokal yang terbaik.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Rasakan Menu Citarasa Kami</p>
            </div>

            <div class="row" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        @forelse ($tipes as $tipe)
                        <li data-filter=".filter-{{$tipe->id}}" style="text-transform: capitalize">{{$tipe->nama}}</li>
                        @empty
                        <li>tidak ada data</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="row menu-container" data-aos-delay="200">
                @forelse ($menus as $menu)
                    <div class="col-lg-6 menu-item filter-{{$menu->tipemenu_id}}">
                        @empty($menu->gambar)
                        <img src="{{asset('/img/noimage.png')}}" class="menu-img" alt="{{$menu->nama}}">
                        @else
                        <img src="{{asset('/img/menu/'.$menu->gambar)}}" class="menu-img" alt="{{$menu->nama}}">
                        @endempty
                        <div class="menu-content">
                            <a href="#" style="text-transform: capitalize">{{$menu->nama}}</a><span>Rp. {{number_format($menu->harga)}}</span>
                        </div>
                        <div class="menu-ingredients">
                            {!!$menu->deskripsi!!}
                        </div>
                    </div>
                @empty
                    <div class="col-lg-6 menu-item filter-1">
                        <img src="{{asset('/img/menu/menu1.jpg')}}" class="menu-img" alt="">
                        <div class="menu-content">
                            <p>Tidak ada data</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
        <div class="container">

            <div class="section-title">
                <h2>Staff</h2>
                <p>Staff yang bekerja dengan kami</p>
            </div>
            <div class="row" data-aos-delay="100">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                    @forelse ($jabatans as $jabatan)
                        <li class="nav-item">
                            <a class="nav-link show " data-bs-toggle="tab" href="#tab-{{$jabatan->id}}" style="text-transform: capitalize">{{$jabatan->nama}}</a>
                        </li>
                    @empty

                        <li class="nav-item">
                            <a class="nav-link show active" data-bs-toggle="tab" href="#tab-1">Tidak ada data</a>
                        </li>
                    @endforelse
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        @forelse ($jabatans as $jabatan1)
                        <div class="tab-pane mt-2" id="tab-{{$jabatan1->id}}">
                            @forelse ($karyawans as $karyawan)
                            @if($karyawan->jabatan_id == $jabatan1->id)
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3 style="text-transform: capitalize">{{$karyawan->nama}}</h3>
                                    <p class="fst-italic">{!!$karyawan->deskripsi!!}</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    @empty($karyawan->foto)
                                    <img src="{{asset('/img/noprofile.png')}}" alt="{{$karyawan->nama}}" class="img-fluid">
                                    @else
                                    <img src="{{asset('/img/staff/'.$karyawan->foto)}}" alt="{{$karyawan->nama}}" class="img-fluid">
                                    @endempty
                                </div>
                            </div>
                            @endif
                                @empty
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 mb-2">
                                        <h3>Tidak ada data </h3>
                                        <p class="fst-italic">Tidak ada data</p>
                                        <p>Tidak ada data</p>
                                    </div>
                                </div>
                                @endforelse
                            </div>

                            @empty

                            @endforelse
                    </div>
                </div>
        </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container">

            <div class="section-title">
                <h2>Acara</h2>
                <p>Buat Acara Anda di Restoran kami</p>
            </div>

            <div class="events-slider swiper" data-aos-delay="100">
                <div class="swiper-wrapper">

                    @forelse ($acaras as $acara)
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                @empty($acara->gambar)
                                <img src="{{asset('/img/noimage.png')}}" class="img-fluid" alt="{{$acara->nama}}">
                                @else
                                <img src="{{asset('/img/event/'.$acara->gambar)}}" class="img-fluid" alt="{{$acara->nama}}">
                                @endempty
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3 style="text-transform: capitalize">{{$acara->nama}}</h3>
                                <div class="price">
                                    <p><span>Rp. {{number_format($acara->harga)}}</span></p>
                                </div>
                                <p class="fst-italic">
                                    {!!$acara->deskripsi!!}
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    @empty
                    <div class="swiper-slide">
                        Tidak ada data
                    </div><!-- End testimonial item -->
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container">

            <div class="section-title">
                <h2>Pemesanan</h2>
                <p>Booking Meja</p>
            </div>
            @if (session()->has('booking'))
            <div class="alert alert-success" role="alert">
            {{session('booking')}}
            </div>
            @endif

            @auth
            @if ($bookings->count()>0)
            <div class="tabel-khusus text-center mt-2">
                <table class="table">
                    <tr class="table-row">
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Waktu</th>
                        <th>Jumlah Orang</th>
                        <th>Keterangan</th>
                        <th>Ubah/Hapus</th>
                    </tr>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{$booking->user->name}}</td>
                            <td>{{$booking->notelp}}</td>
                            <td>{{$booking->user->email}}</td>
                            <td>{{$booking->tanggal_booking}}</td>
                            <td>{{$booking->jumlah}}</td>
                            <td>{!!$booking->deskripsi!!}</td>
                            <td>
                                <form action="{{url('/bookings/'.$booking->id)}}" class="d-inline" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn text-center book-a-table-btn d-none d-lg-flex" onclick="return confirm('Yakin menghapus data ?')">Hapus</button>
                                </form>
                                <button class="btn text-center book-a-table-btn d-none d-lg-flex"><a href="{{url('bookings/'.$booking->id.'/edit')}}">Ubah</a></button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                            <td>tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            @else
                <h3 class="text-center mt-2">Yuk, Booking Dulu</h3>
            @endif
            @endauth
            <div class="col-lg-12 d-flex justify-content-center mt-4">
                <a href="{{url('/bookings/create')}}" class="text-center book-a-table-btn d-none d-lg-flex">Booking Meja</a>
            </div>
        </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimoni</h2>
                <p>Bagaimana Pendapat mereka tentang kami</p>
            </div>
            @if (session()->has('komen'))
            <div class="alert alert-success" role="alert">
            {{session('komen')}}
            </div>
            @endif
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @forelse ($komentars as $komentar)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{$komentar->isi}}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            @empty($komentar->user->picture)
                            <img src="{{asset('/img/noprofile.png')}}" class="testimonial-img" alt="{{$komentar->user->name}}">
                            @else
                            <img src="{{asset('/img/profil/'.$komentar->user->picture)}}" class="testimonial-img" alt="{{$komentar->user->name}}">
                            @endempty
                            <h3 style="text-transform: capitalize">{{$komentar->user->name}}</h3>
                            <h4 style="text-transform: capitalize">{{$komentar->ket}}</h4>
                            @auth
                            @if (auth()->user()->id == $komentar->user_id)
                            <div class="row mt-3">
                                <a href="{{url('komens/'.$komentar->id.'/edit')}}" class="book-a-table-btn d-none d-lg-flex col-lg-3 col-md-6">Ubah</a>
                                <form action="{{url('komens/'.$komentar->id)}}" class="-lg-flex col-lg-3 col-md-6" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn text-center book-a-table-btn d-none d-lg-flex" onclick="return confirm('Yakin menghapus komentar ?')">Hapus</button>
                                </form>
                            </div>
                            @endif
                            @endauth

                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>Tidak ada data</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
            @auth
            <div class="col-lg-12 d-flex justify-content-center mt-4">
                <a href="{{url('/komens/create')}}" class="text-center book-a-table-btn d-none d-lg-flex">Berikan Testimoni</a>
            </div>
            @endauth
        </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>Hubungi Kami</p>
            </div>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Lokasi:</h4>
                            <p>2 x 11 Kayutanam, Padang Pariaman, Sumatera Barat</p>
                        </div>

                        <div class="open-hours">
                            <i class="bi bi-clock"></i>
                            <h4>Jam Buka:</h4>
                            <p>
                                Senin - Sabtu:<br>
                                11:00 Pagi - 11:00 Malam
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>raihansurya4000@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Kontak:</h4>
                            <p>+1 5589 55488 554</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
