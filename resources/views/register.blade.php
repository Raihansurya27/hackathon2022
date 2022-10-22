@extends('layout.main')
@section('title','Daftar - Restoran Istimewa')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftar</h2>
                <ol>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li><a href="{{url('/login')}}">Login</a></li>
                    <li>Daftar</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="inner-page">
        <div class="container">
            <div class="book-a-table menu-item filter-buat">
                <div class="section-title">
                    <h2>Daftar</h2>
                    <p>Buat Akun Baru</p>
                </div>
                <form action="{{url('/register')}}" method="POST" role="form" class=" form-khusus" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-6 form-group">
                            <input type="email" name="email" class="form-control @error('email')is-invalid
                            @enderror" id="email" placeholder="Contoh: raihanganteng@example.com" value="{{old('email')}}">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6 form-group mt-3 mt-md-0">
                            <input type="password" class="form-control @error('password')is-invalid
                            @enderror" name="password" id="password" placeholder="Masukkan Password Baru" value="{{old('password')}}">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6 form-group mt-3 mt-md-0">
                            <input type="text" class="form-control @error('name')is-invalid
                            @enderror" name="name" id="name" placeholder="Nama Anda" value="{{old('name')}}">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>

                        <div class="col-lg-12 col-md-12 form-group mt-3 mt-md-0">
                            <input type="file" class="form-control @error('picture')is-invalid
                            @enderror" name="picture" id="picture" placeholder="Foto Profil" value="{{old('picture')}}">
                            @error('picture')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="text-center"><button type="submit">Daftar</button></div>
                </form>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
