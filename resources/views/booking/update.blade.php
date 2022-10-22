@extends('layout.main')
@section('title','Booking Meja - Restoran Istimewa')
@section('content')
  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Update Booking Meja</h2>
          <ol>
            <li><a href="{{url('/home#book-a-table')}}">Beranda</a></li>
            <li>Booking Meja</li>
            <li>Update Booking Meja</li>
          </ol>
        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="book-a-table menu-item filter-buat">
            <div class="section-title">
                <h2>Booking Meja</h2>
                <p>Update Booking Meja</p>
            </div>
                <form action="{{url('/bookings/'.$bookings->id)}}" method="post" role="form" class=" form-khusus" data-aos="fade-up" data-aos-delay="100">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="date" name="tanggal_booking" class="form-control @error('tanggal_booking')is-invalid
                            @enderror" id="tanggal_booking" placeholder="Tanggal Booking" value="{{old('tanggal_booking',$bookings->tanggal_booking)}}">
                            @error('tanggal_booking')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="text" name="notelp" class="form-control @error('notelp')is-invalid
                            @enderror" id="notelp" placeholder="Nomor Telepon" value="{{old('notelp',$bookings->notelp)}}">
                            @error('notelp')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="number" class="form-control  @error('jumlah')is-invalid
                            @enderror" name="jumlah" id="jumlah" placeholder="Jumlah orang" value="{{old('jumlah',$bookings->jumlah)}}">
                            @error('jumlah')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control ckeditor @error('deskripsi')is-invalid
                        @enderror" name="deskripsi" rows="5" placeholder="Deskripsi/Keterangan">{{old('deskripsi',$bookings->deskripsi)}}</textarea>
                        @error('deskripsi')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="text-center"><button type="submit">Update Booking</button></div>
                </form>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
