@extends('template.main')
@section('titulo')

Titulo de la pagina

@endsection
@section('cuerpo')   
    <div class="row" >
        <div class="col-md-12">
             @if($publicaciones->count()) 
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Puntos</th>

                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($publicaciones as $proyecto)
                            <tr>
                                <td>         <img src="{{ asset('storage/Abel.jpg') }}"  width="100">

								</td>
                                <td>{{$proyecto->titulo}}</td>
                                <td>{{$proyecto->autor}}</td>
                                <th>{{$proyecto->fecha}}</th>
                                <th>{{$proyecto->user->name}}</th>
                                <th>{{$proyecto->puntaje}}</th>

                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('publicacion.show', $proyecto->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('publicacion.edit', $proyecto->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('publicacion.destroy', $proyecto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $publicaciones->render() !!}
            @else 
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
</div>
</div>
@endsection