@extends('layouts.app')
@section('title','Crear Caballo')
@section('content')
    <div class="row">
	    <div class="col-lg-12">
	    <h1>Agregar Caballo</h1>
	    <hr>
	    	{!! Form::open(['route' => 'admin.caballo.store','method' => 'POST','files'=>'true']) !!}

	    		<div class="form-group">
	    			{!! Form::label('nombre','Nombre') !!}
	    			{!! Form::text('nombre', null,['class'=> 'form-control','placeholder'=>'Nombre Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('edad','Edad') !!}
	    			{!! Form::text('edad', null,['class'=> 'form-control','placeholder'=>'Edad del Caballo','required']) !!}
	    		</div>	    		
	    		<div class="form-group">
	    			{!! Form::label('padre','Padre') !!}
	    			{!! Form::text('padre', null,['class'=> 'form-control','placeholder'=>'Padre del Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('madre','Madre') !!}
	    			{!! Form::text('madre', null,['class'=> 'form-control','placeholder'=>'Madre del Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('ubicacion','Ubicacion') !!}
	    			{!! Form::text('ubicacion', null,['class'=> 'form-control','placeholder'=>'Ubicacion del Caballo','required']) !!}
	    		</div>	    		
	    		<div class="form-group">
	    			{!! Form::label('sexo','Sexo') !!}
	    			{!! Form::select('sexo',array('macho' => 'Macho', 'hembra' => 'Hembra'),null,array('class'=>'form-control')) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('descripcion','Descripcion') !!}
                    {!! Form::textarea('descripcion', null,['class' => 'form-control','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::label('images','Imagenes') !!}
                    {!! Form::file('images[]', array('multiple'=>true)) !!}
	    		</div>

	    		<div class="form-group">
	    			{!! Form::submit('Agregar Caballo',['class'=>'btn btn-primary']) !!}
	    		</div>

	    	{!! Form::close() !!}
	    </div>
	</div>
<!-- /.row -->
@endsection