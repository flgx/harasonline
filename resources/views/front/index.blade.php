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
	<section id="productos" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Últimos productos agregados</h2>
				<h4 class="light muted">Hacer click para ver más informacion de los pura sangre.</h4>
			</div>
			<div class="row services">
			@foreach($horses as $horse)
			<a href="{{route('horse.show',$horse->id)}}"></a>
				<div class="col-md-3">
					<div class="productos">
					<?php $myimage='';$i=0; ?>
					@foreach($horse->images as $image)
						<?php
							if($i == 0){
								$myimage=$image->nombre;
							}							
							$i++;
						?>
					@endforeach
						<div>
							<img src="img/horses/thumbs/thumb_{{$myimage}}" alt="" class="img-responsive icon">
						</div>
						<h4 class="heading">
							<a  class="title-index" href="{{route('horse.show',$horse->slug)}}">{{$horse->nombre}}</a>
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
						<a href="{{route('horse.show',$horse->slug)}}">
							<button class="morebtn btn-primary">Ver Más</button>
						</a>
						</div>
					</div>
				</div>
			@endforeach
					<button class="btn btn-blue ripple trial-button view-all col-xs-12">Ver todos</button>

			</div>
		</div>

		<div class="cut cut-bottom"></div>
	</section>
	<section id="nosotros" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Acerca de Nosotros</h2>
			</div>
			<div class="row ">
			<div class="col-md-6">
				<h6>
					Haras Online fue creado por un grupo de emprendedores marplatenses que decidieron acercarle al mundo del turf la posibilidad de comprar SPC criados en la mejor zona del país. <br/> 
					Nuestro objetivo es formar parte del lazo que une al comprador con los SPC, facilitando toda la información necesaria (pedigree desarrollado, imágenes de alta calidad y videos) para que su decisión de compra sea segura. 
					Si desea conocer al animal, concretamos una reunión para su visita, en caso de que no pueda acercarse y desea enviar a alguien de su confianza para verificar la sanidad del producto, también lo puede hacer sin compromiso de compra.
					Cualquier consulta que quiera hacer no dude en contactarse con nosotros y le daremos una respuesta dentro de las 24hs.
				</h6>
				<a href="#contacto"><button class="morebtn btn-primary">Envianos un mensaje</button></a>
			</div>
			<div class="col-md-6">
				<img src="img/about.jpg" alt="" class="img-responsive icon">

			</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div  class="item text-center">
							<i class="icon fa fa-phone"></i>
							<h4 class="white light">Comunicate con nosotros haciendo click en nuestro numero.</h4>
							<a href="tel:22315|	6350589"><h4 class="light-white light">(223)156350589</h4></a>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-answer"></i>
							<h4 class="white light">Compartimos la misma pasión.</h4>
							<h4 class="light-white light">#caballos #purasangre</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Te acercamos a la victoria.</h4>
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