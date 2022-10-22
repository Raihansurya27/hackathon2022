@extends('layout.main')
@section('title','Testimoni/komentar - Restoran Istimewa')
@section('content')
  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Testimoni</h2>
          <ol>
            <li><a href="{{url('/home#testimonials')}}">Beranda</a></li>
            <li>Testimoni</li>
          </ol>
        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="book-a-table menu-item filter-buat">
            <div class="section-title">
                <h2>Testimoni</h2>
                <p>Beri kami masukan agar Restoran Istimenwa lebih baik lagi</p>
            </div>

                <form action="{{url('/komens')}}" method="post" role="form" class=" form-khusus" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 form-group">
                            <input type="text" class="form-control @error('ket')is-invalid
                            @enderror" name="ket" id="ket" placeholder="Status Anda (ex: pekerjaan)" value="{{old('ket')}}">
                            @error('ket')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control @error('isi')is-invalid
                        @enderror" name="isi" rows="5" placeholder="Isi komentar/Testimoni">{{old('isi')}}</textarea>
                        @error('isi')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center"><button type="submit">Kirim</button></div>
                </form>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
