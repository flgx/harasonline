@extends('layouts.app')

@section('title','Listado de usuarios')

@section('content')
	@if(Auth::user()->type == 'admin')
    <div class="row">
    	<h1>
    		Listado de usuarios
    	</h1>
    	<a href="{{ url('/register') }}" class="btn btn-primary">Agregar Usuario</a>
    	<hr>
    	@if(count($users) > 0)
    	<div class="">

			<table class="table table-bordered">

				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>				
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->type}}</td>
						<td>						

							<a href="{{route('admin.caballos.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
							
								<a href="#" data-userid="{{$user->id}}" onclick="return confirm('Estas seguro?');" class="btn btn-danger btn-delete-user"><i class="fa fa-trash"></i></a>							
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
    	{!! $users->render() !!}
    </div>
    @else
    	<h1>Acceso no permitido.</h1>
    @endif

@endsection
@section('front-js')
<script>
    $('.btn-delete-user').on('click', function(e) {
        var myThis = $(this).parent().parent();
        var dataId = $(this).data('userid');
        $.ajax({
            url: '{{ url('/admin/users/destroyuser') }}' + '/' + dataId,
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