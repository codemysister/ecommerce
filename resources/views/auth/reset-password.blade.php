@extends('frontend.main_master')
@section('home')


@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forgot Password</h4>
	<p class="">Forgot your password? Don't Worry</p>
	
	<form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" id="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password Confirmation <span>*</span></label>
		    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
		
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>					
</div>
<!-- Sign-in -->

</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brand')<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection