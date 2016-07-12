@extends('layouts.master')
@section('nav')
	@include('layouts.partials.nav')
@endsection
@section('content')
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">¿Buscas un caballo?</h3>
							<h1 class="white typed">Compra tu pura sangre con nosotros</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="cut cut-top"></div>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Caballos</h2>
				<h4 class="light muted">Ultimos caballos agregados</h4>
			</div>
			<div class="row services">
			@foreach($horses as $horse)
			<a href="{{route('horse.show',$horse->id)}}"></a>
				<div class="col-md-3">
					<div class="service">
					<?php $myimage=''; ?>
					@foreach($horse->images as $image)
						<?php $myimage=$image->nombre; ?>
					@endforeach
						<div>
							<img src="img/horses/thumbs/thumb_{{$myimage}}" alt="" class="img-responsive icon">
						</div>
						<h4 class="heading">
							{{$horse->nombre}}
						</h4>
						<h4 class="heading plus fa fa-plus fa-2x"></h4>
						<div class="description">
							<ul>
								<li>Categoria: {{$horse->category->nombre}}.</li>
								<li>Sexo: {{$horse->sexo}}.</li>
								<li>Edad: {{$horse->edad}}.</li>
								<li>Madre: {{$horse->madre}}.</li>
								<li>Padre: {{$horse->padre}}.</li>
								<li>Ubicacion: {{$horse->ubicacion}}.</li>
							</ul>
							<p>{{ str_limit($horse->descripcion,100)}}</p>
						<a href="{{route('horse.show',$horse->id)}}">
							<button class="morebtn btn-primary">Ver Más</button>
						</a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item text-center">
							<i class="icon fa fa-phone"></i>
							<h4 class="white light">Comunicate con nosotros haciendo click en nuestro numero.</h4>
							<a href="tel:555-555-5555"><h4 class="light-white light">2235906016</h4></a>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-answer"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Sign Up</h3>
				<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pricing Plan
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
							<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection