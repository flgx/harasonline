@extends('layouts.app')
@section('title','Editar Categoria')
@section('content')
    <div class="row">
	    <div class="col-lg-12">
	    <h1>Editar Categoria</h1>
	    <hr>
	    	{!! Form::open(['route' => ['admin.categorias.update',$category->id],'method' => 'PUT']) !!}
	    		<div class="form-group">
	    			{!! Form::label('nombre','Nombre') !!}
	    			{!! Form::text('nombre', $category->nombre,['class'=> 'form-control','placeholder'=>'Nombre Caballo','required']) !!}
	    		</div>
	    		<div class="form-group">
	    			{!! Form::submit('Editar Caballo',['class'=>'btn btn-primary']) !!}
	    		</div>
	    	{!! Form::close() !!}
	    </div>
	</div>
@endsection