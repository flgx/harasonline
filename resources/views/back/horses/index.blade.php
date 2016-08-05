@extends('layouts.app')

@section('title','Listado de caballos')

@section('content')

    <div class="row">

    	<h1>

    		Listado de caballos

    	</h1>

    	<a href="{{route('admin.caballos.create')}}" class="btn btn-primary">Agregar Caballo</a>

    	<hr>



    	@if(count($horses) > 0)

    	<div class="">

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

							<a href="{{route('admin.caballos.edit',$horse->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
							@if(Auth::user()->type == 'admin')
								<a href="#" data-horseid="{{$horse->id}}" onclick="return confirm('Estas seguro?');" class="btn btn-danger btn-delete-horse"><i class="fa fa-trash"></i></a>
							@endif
						</td>



					</tr>

				@endforeach

				</tbody>

			</table>

		</div>

		@else

			<h4>No hay caballos. Porfavor, agregue alguno.</h4>

		@endif

    </div>
    <div class="text-center">
    	{!! $horses->render() !!}
    </div>
		
@endsection

@section('front-js')

<script>

    $('.btn-delete-horse').on('click', function(e) {

        var myThis = $(this).parent().parent();

        var dataId = $(this).data('horseid');



        $.ajax({

            url: '{{ url('/admin/caballos/destroyHorse') }}' + '/' + dataId,

            type: 'DELETE',

            data:{_token:token,id:dataId},

            success: function(msg) {

                console.log(msg['msg']);

                

                $(myThis).fadeOut(250);

            }

        });

    });	

</script>

@endsection