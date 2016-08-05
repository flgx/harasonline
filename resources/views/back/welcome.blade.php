@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading"><h2>Hola! Bienvenido al sistema de <strong>Haras Online</strong></h2></div>

                <div class="panel-body">
                    
                        <div class="col-xs-12">
                            <h3>
                                Últimos caballos agregados
                            </h3>
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
                            <div class="text-center">
                                {!! $horses->render() !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
