@extends('layouts.app')
@section('title','Listado de caballos')
@section('content')
    <div class="row">
    	<div class="col-xs-6">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>IMG</th>
					</tr>
				</thead>
				<tbody>
				@foreach($horses as $horse)
					<tr>					
						<td>{{$horse->id}}</td>
						<td>{{$horse->nombre}}</td>	
						<td>{{$horse->images->nombre)}}</td>					
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
    </div>
@endsection