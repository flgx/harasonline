@extends('layouts.master')
@section('nav')
	@include('layouts.partials.navSingle')
@endsection
@section('content')
	<section>
	<div class="cut cut-top"></div>
	<section id="services" class="section section-padded">
		<div class="container-full">
			<div class="row text-center title">
				<h2>{{$horse->nombre}}</h2>
			</div>
			<div class="row services">
					<!-- SLIDER -->
					<div id="myCarousel" class="carousel slide col-md-8 col-md-offset-2" data-ride="carousel"> 
						  <!-- Indicators -->
						  
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						  @foreach($horse->images as $image)
						    <div class="item"> 
						    	{{ HTML::image('img/horses/slider_'.$image->nombre, '$horse->nombre') }}

						    </div>
						  @endforeach
						  	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
						  </div>
					<!-- END SLIDER -->
					</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 >Ficha tecnica</h2>
			<ul class="list-group">
				<li class="list-group-item"><h4>Categoria</h4> {{$horse->category->nombre}}</li>
				<li class="list-group-item"><h4>Sexo</h4> {{$horse->sexo}}</li>
				<li class="list-group-item"><h4>Edad</h4> {{$horse->edad}}</li>
				<li class="list-group-item"><h4>Ubicación</h4> {{$horse->ubicacion}} </li>
				<li class="list-group-item" >
				<h4>Descripcion</h4>
					{{$horse->descripcion}}
				</li>
			</ul>
		</div>
		</div>
	</div>
@endsection