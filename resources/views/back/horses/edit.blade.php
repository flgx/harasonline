@extends('layouts.app')
@section('title','Editar Caballo')
@section('content')
    <div class="row">
	    <div class="col-md-6">
		    <h1>Editar Caballo</h1>
		    <hr>
		    	{!! Form::open(['route' => ['admin.caballos.update',$horse->id],'method' => 'PUT','files'=>'true']) !!}

		    		<div class="form-group">
		    			{!! Form::label('nombre','Nombre') !!}
		    			{!! Form::text('nombre', $horse->nombre,['class'=> 'form-control','placeholder'=>'Nombre Caballo','required']) !!}
		    		</div>
		    		<div class="form-group">
		    			{!! Form::label('categoria','Categoria') !!}
		    			{!! Form::select('categoria', $categories, $horse->category->id,array('class'=>'form-control')); !!}
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
		    			{!! Form::label('video_url','Video') !!}
		    			{!! Form::text('video_url', $horse->video_url,['class'=> 'form-control','placeholder'=>'Url de YouTube','required']) !!}
		    		</div>		
		    		<div class="form-group">
		    			{!! Form::label('images','Imagenes') !!}
	                    {!! Form::file('images[]', array('multiple'=>true)) !!}
		    		</div>


		    		<div class="form-group">
		    			{!! Form::submit('Editar Caballo',['class'=>'btn btn-primary']) !!}
		    		</div>

		    	{!! Form::close() !!}
	    </div>
	    <!-- Horse Images -->
	    <div class="col-md-6">
	    	<h1>Galeria de imágenes</h1>
		    <hr>
		    @if(count($horse->images) > 0)	
		    	<?php
					$i=0;
				?>
				@foreach($horse->images as $image)
				<div class="col-xs-12">
					<?php if($i==0){echo '<h1>Imágen principal:</h1>';} ?>
					{{ HTML::image('img/horses/thumbs/thumb_'.$image->nombre, '$horse->nombre') }}
					
					<p class="col-xs-12">
						<a href="#" class="btn-delete btn btn-danger" data-horse="{{$image->id}}">Delete</a>
					</p>
					<?php if($i==0){echo '<hr>';} ?>
				</div>
				<?php $i++; ?>
				@endforeach
			@else
				<p>No hay imágenes. Por favor, agregue alguna.</p>	
			@endif   	
	    </div>
	</div>
<!-- /.row -->
@endsection
@section('front-js')
<script>
    $('.btn-delete').on('click', function(e) {
        var myThis = $(this).parent().parent();
        var dataId = $(this).data('horse');

        $.ajax({
            url: '{{ url('/admin/imagen/destroyImage') }}' + '/' + dataId,
            type: 'DELETE',
            data:{_token:token,id:dataId},
            success: function(msg) {
                console.log(msg['msg']);
                
                $(myThis).fadeOut(150);
            }
        });
    });
</script>
@endsection