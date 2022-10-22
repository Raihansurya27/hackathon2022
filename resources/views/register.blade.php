
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href="{{asset('/img/logo-icon.png')}}" rel="icon">
  <link href="{{asset('/img/logo-icon.png')}}" rel="apple-touch-icon">
</head>
<body>
	<div class="container-fluid">
		<div class="row ">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-flex justify-content-center d-md-block infinity-image-container">
				<img src="/img/logo3.png" height="100%"  >
			</div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<a href="{{url('/')}}"><img src="/img/logo2.png" width="110px"></a>
					</div>
					<div class="text-center mb-4 mt-3">
			      <h2>DAFTAR</h2>
			    </div>
			    <!-- Form -->
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
                    <div class="text-center"><button type="submit" class="btn btn-block">Daftar</button></div>
                </form>
                <div class="text-center mt-3 text-white">Sudah punya akun?
                    <a class="register-link" href="{{url('/login')}}">Log In</a>
             </div>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>
</html>






