@extends('layouts.app')
@section('title','Agregar Categoria')
@section('content')
    <div class="row">
	    <div class="col-lg-12">
	    <h1>Agregar Categoria</h1>
	    <hr>
	    	{!! Form::open(['route' => 'admin.categorias.store','method' => 'POST']) !!}
	    		<div class="form-group">
	    			{!! Form::label('nombre','Nombre') !!}
	    			{!! Form::text('nombre', null,['class'=> 'form-control','placeholder'=>'Nombre Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::submit('Agregar Caballo',['class'=>'btn btn-primary']) !!}
	    		</div>
	    	{!! Form::close() !!}
	    </div>
	</div>
@endsection