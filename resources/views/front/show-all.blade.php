@extends('layouts.master')

@section('nav')

	@include('layouts.partials.navSingle')

@endsection

@section('content')

	<section id="productos" class="section section-padded">

		<div class="container">

			<div class="row text-center title">

				<h2>Todos nuestros productos</h2>

				<h4 class="light muted">Hacer click para ver más informacion de los pura sangre.</h4>

			</div>

			<div class="row services">
			<?php $c=0; ?>
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

							<div class="last-horses-img">

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

									<li>Padre: {{$horse->padre}}.</li>

									<li>Madre: {{$horse->madre}}.</li>								

									<li>Ubicacion: {{$horse->ubicacion}}.</li>								

									<li>Precio: ${{$horse->precio}}.</li>

								</ul>

								<p>{{ str_limit($horse->descripcion,100)}}</p>

							<a href="{{route('horse.show',$horse->slug)}}">

								<button class="morebtn btn-primary">Ver Más</button>

							</a>

							</div>

						</div>

					</div>
				<?php 
					if($c == 3){
						echo '<div class="clearfix"></div>';
					} 
					$c++;
				?>
			@endforeach

			</div>

		</div>

		<div class="text-center">

			{!! $horses->render() !!}

		</div>

		<div class="cut cut-bottom"></div>

	</section>



@endsection