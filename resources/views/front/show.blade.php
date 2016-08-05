@extends('layouts.master')
@section('nav')
	@include('layouts.partials.navSingle')
@endsection
@section('content')
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
						  <?php $i=0;?>
						  @foreach($horse->images as $image)
						    <div class="item <?php if($i==0){echo 'active';} ?>"> 
						    	{{ HTML::image('img/horses/slider_'.$image->nombre, $horse->nombre,array('style'=>'width:100%')) }}

						    </div>
						    <?php $i++; ?>
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
			<div class="col-md-6">
				<h2 >Ficha tecnica</h2>
				<ul class="list-group">
					<li class="list-group-item"><h4>Categoria</h4> {{$horse->category->nombre}}</li>
					<li class="list-group-item"><h4>Padre</h4> {{$horse->padre}}</li>
					<li class="list-group-item"><h4>Madre</h4> {{$horse->madre}}</li>
					<li class="list-group-item"><h4>Sexo</h4> {{$horse->sexo}}</li>
					<li class="list-group-item"><h4>Edad</h4> {{$horse->edad}}</li>
					<li class="list-group-item"><h4>Ubicación</h4> {{$horse->ubicacion}} </li>
					<li class="list-group-item" >
						<h4 clas>Descripcion</h4>
						{{$horse->descripcion}}
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<h2>Video</h2>
				<div class="embed-responsive embed-responsive-16by9">
  					<iframe allowFullScreen class="embed-responsive-item" src="{{$horse->video_url}}"></iframe>
				</div>
				<h3>
				<a href="#contacto"><button type="button" class="btn btn-primary btn-lg">Consulta sobre este caballo</button></h3>
		
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

@section('front-js')
@endsection