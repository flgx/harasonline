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
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($horses as $horse)
					<tr>					
						<td>{{$horse->id}}</td>
						<td>{{$horse->nombre}}</td>	
						<td>
							<a href="{{route('admin.caballo.destroy',$horse->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							<a href="{{route('admin.caballo.edit',$horse->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
						</td>

					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
    </div>
@endsection