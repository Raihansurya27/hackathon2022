
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>RM KITO BASAMO | Login</title>
</head>
<body>

<main id="main" class="full-height">




            <div class="cpanel-login-v3 flex justify-center full-height">
                <div class="cpanel-login-v3 flex justify-center full-height">
                    <div class="cpanel-login-v3_left flex justify-center">


                    <h2>Masuk</h2>
                    <p>Masuk ke Akun</p>
                    @if (session()->has('daftar'))
                        <div class="alert alert-success" role="alert">
                        {{session('daftar')}}
                        </div>
                    @endif


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
                    <div class="text-center mt-5">
                        <p class=" mb-0">Sudah punya akun?</p>
                        <a href="{{url('/register')}}">Daftar</a>
                    </div>
                </form>
                    </div>

            </div>
            </div>


</main><!-- End #main -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>


{{-- @endsection --}}

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row ">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<img src="logo.png" width="150px">
					</div>
					<div class="text-center mb-4">
			      <h4>Login into your account</h4>
			    </div>
			    <!-- Form -->
                <form action="{{url('login')}}" method="POST" role="form" class=" form-khusus" data-aos="fade-up" enctype="multipart/form-data" data-aos-delay="100">
                    @csrf
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-envelope-o"></i></span>
							<input type="email" name="" placeholder="Email Address" tabindex="10"required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="" placeholder="Password" required>
						</div>
						<div class="row mb-3">
						<!-- Remember Checkbox -->
			        <div class="col-auto d-flex align-items-center">
			          <div class="custom-control custom-checkbox">
			            <input type="checkbox" class="custom-control-input" id="cb1">
			           	<label class="custom-control-label text-white" for="cb1">Remember me</label>
			          </div>
			        </div>
			 	    </div>
			 	    <!-- Login Button -->
			      <div class="mb-3">
							<button type="submit" class="btn btn-block">Login</button>
						</div>
						<div class="text-right ">
			        <a href="reset.html" class="forget-link">Forgot password?</a>
			      </div>
						<div class="text-center mb-2">
		         	<div class="text-center mb-2 text-white">or login with</div>

		         	<!-- Facebook Button -->
		         	<a href="" class="btn btn-social btn-facebook">facebook</a>

		         	<!-- Google Button -->
							<a href="" class="btn btn-social btn-google">google</a>

							<!-- Twitter Button -->
							<a href="" class="btn btn-social btn-twitter">twitter</a>
						</div>
						<div class="text-center mb-5 text-white">Don't have an account?
							<a class="register-link" href="register.html">Register here</a>
			     	</div>
					</form>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>
</html>





