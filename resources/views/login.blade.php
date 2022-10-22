




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
			<div class="col-lg-6 col-md-6 d-flex justify-content-center d-md-block infinity-image-container">
				<img src="/img/logo3.jpg" height="100%"  >
			</div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<img src="/img/logo2.png" width="110px">
					</div>
					<div class="text-center mb-4 mt-3">
			      <h2>Login</h2>
			    </div>
			    <!-- Form -->
                <form action="{{url('login')}}" method="POST" role="form" class=" form-khusus" data-aos="fade-up" enctype="multipart/form-data" data-aos-delay="100">
                    @csrf


                        <div class="form-input">
                            <span><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="email" class="form-control @error('email')is-invalid
                            @enderror"  placeholder="Email" data-rule="email" data-msg="Please enter a valid email" value="{{old('email')}}">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>


                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control @error('password')is-invalid
                            @enderror" name="password"  placeholder="Password" data-rule="password" data-msg="Please enter a valid password">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
						<div class="text-right ">
							<a href="reset.html" class="forget-link">Lupa password?</a>
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
							<button type="submit" class="btn btn-block">LOG IN</button>
						</div>
						
						<div class="text-center mb-5 text-white">Belum punya akun?
							<a class="register-link" href="{{url('/register')}}">Daftar</a>
			     	</div>


					</form>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>
</html>





