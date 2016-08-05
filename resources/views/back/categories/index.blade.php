@extends('layouts.app')
@section('title','Listado Categorias')
@section('content')
    <div class="row">
    	<h1>Listado Categorias</h1>
    	<div>
    		<a class="btn btn-primary" href="{{route('admin.categorias.create')}}">
    			Agregar Categoria
    		</a>
    	</div>
    	<hr>
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
				@foreach($categories as $category)
					<tr>					
						<td>{{$category->id}}</td>
						<td>{{$category->nombre}}</td>	
						<td>
							<a href="{{route('admin.categorias.edit',$category->id)}}" class="btn btn-warning">
								<i class="fa fa-pencil"></i>
							</a>							
							@if(Auth::user()->type == 'admin')
								<a href="#" onclick="return confirm('Estas seguro?');" data-categoryid="{{$category->id}}" class="btn btn-danger btn-delete-category">
									<i class="fa fa-trash"></i>
								</a>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{!! $categories->render() !!}
			</div>
		</div>
    </div>
@endsection
@section('front-js')
<script>
    $('.btn-delete-category').on('click', function(e) {
        var myThis = $(this).parent().parent();
        var dataId = $(this).data('categoryid');
        $.ajax({
            url: '{{ url('/admin/categorias/destroyCategory') }}' + '/' + dataId,
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