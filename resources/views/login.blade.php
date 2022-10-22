@extends('layout.main')
@section('title','Masuk - Restoran Istimewa')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Masuk</h2>
                <ol>
                    <li><a href="{{url('/home')}}">Beranda</a></li>
                    <li>Masuk</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="inner-page">
        <div class="container">
            <div class="book-a-table menu-item filter-buat">
                <div class="section-title">
                    <h2>Masuk</h2>
                    <p>Masuk ke Akun</p>
                    @if (session()->has('daftar'))
                        <div class="alert alert-success" role="alert">
                        {{session('daftar')}}
                        </div>
                    @endif
                </div>

                <form action="{{url('login')}}" method="POST" role="form" class=" form-khusus" data-aos="fade-up" enctype="multipart/form-data" data-aos-delay="100">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-6 form-group">
                            <input type="email" name="email" class="form-control @error('email')is-invalid
                            @enderror"  placeholder="Email" data-rule="email" data-msg="Please enter a valid email" value="{{old('email')}}">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-6 form-group mt-3 mt-md-0">
                            <input type="password" class="form-control @error('password')is-invalid
                            @enderror" name="password"  placeholder="Password" data-rule="password" data-msg="Please enter a valid password">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class=" mt-1">Masuk</button>
                    </div>
                    <div class="text-center mt-4">
                        <p class=" mb-0">Sudah punya akun?</p>
                        <a href="{{url('/register')}}">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
