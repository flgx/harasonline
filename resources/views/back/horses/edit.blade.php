@extends('layouts.app')
@section('title','Editar Caballo')
@section('content')
    <div class="row">
	    <div class="col-md-6">
	    <h1>Editar Caballo</h1>
	    <hr>
	    	{!! Form::open(['route' => ['admin.caballo.update',$horse->id],'method' => 'PUT','files'=>'true']) !!}

	    		<div class="form-group">
	    			{!! Form::label('nombre','Nombre') !!}
	    			{!! Form::text('nombre', $horse->name,['class'=> 'form-control','placeholder'=>'Nombre Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('edad','Edad') !!}
	    			{!! Form::text('edad', $horse->edad,['class'=> 'form-control','placeholder'=>'Edad del Caballo','required']) !!}
	    		</div>	    		
	    		<div class="form-group">
	    			{!! Form::label('padre','Padre') !!}
	    			{!! Form::text('padre', $horse->padre,['class'=> 'form-control','placeholder'=>'Padre del Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('madre','Madre') !!}
	    			{!! Form::text('madre', $horse->madre,['class'=> 'form-control','placeholder'=>'Madre del Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('ubicacion','Ubicacion') !!}
	    			{!! Form::text('ubicacion', $horse->ubicacion,['class'=> 'form-control','placeholder'=>'Ubicacion del Caballo','required']) !!}
	    		</div>	    		
	    		<div class="form-group">
	    			{!! Form::label('sexo','Sexo') !!}
	    			{!! Form::select('sexo',array('macho' => 'Macho', 'hembra' => 'Hembra'),$horse->sexo,array('class'=>'form-control')) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('descripcion','Descripcion') !!}
                    {!! Form::textarea('descripcion', $horse->descripcion,['class' => 'form-control','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('images','Imagenes') !!}
                    {!! Form::file('images[]', array('multiple'=>true)) !!}
	    		</div>

	    		<div class="form-group">
	    			@foreach($images as $image)
	    				<div class="col-xs-4">
							<img src="img/horses/thumbs/thumb_{{$image}}" alt="{{$horse->nombre}}">
						</div>
	    			@endforeach
	    		</div>

	    		<div class="form-group">
	    			{!! Form::submit('Agregar Caballo',['class'=>'btn btn-primary']) !!}
	    		</div>

	    	{!! Form::close() !!}
	    </div>
	</div>
<!-- /.row -->
@endsection