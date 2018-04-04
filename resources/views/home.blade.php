@extends('template.main')
@section('titulo')

Titulo de la pagina

@endsection
@section('cuerpo')

<section>
<div class="container">
        <div class="col-md-12 panel panel-default" >

                        @foreach($publicaciones as $proyecto)

    <div class="row" style="border-style: solid;border-color: white;border-width: thin;">



        <div class="col-md-12 panel panel-default">
                <div class="form-row">
                <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ route('publicacion.show', $proyecto->id) }}" >
                <img  style="margin-top: 20px;border-style: solid;border-color: white;border-width: thin;" src="/storage/{{$proyecto->imagenPerfil}}"  width="130" height="130" >
                </a>
                </div>
                <div class="form-group col-xs-6 col-sm-8 col-md-9 col-lg-10 " style="margin-top: 20px;border-style: solid;border-color: white;border-width: thin;">
                <div class="col-md-12 panel panel-default">
  				                <div style="margin-left: 10px;" class="form-row ">
                <h3 ><b><a  href="{{ route('publicacion.show', $proyecto->id) }}" >{{$proyecto->titulo}}</a></b> </h3>
                                </div>                
                <div class="form-row" style="margin-top: 20px;">
                <div class="form-group  col-md-2 col-lg-3">
                <h6 style="color: white"><b><i class="fas fa-pencil-alt"></i> {{$proyecto->autor}}</b></h6>
                </div>
                <div class="form-group  col-md-2 col-lg-2">
                <h6 style="color: green"><b><i style="color: green" class="fas fa-thumbs-up"></i> {{$proyecto->puntaje}}</b></h6>
                </div>          
                <div class="form-group  col-md-4 col-lg-3">
                <h6 style="color: white"><b><i class="fas fa-calendar"></i> {{$proyecto->fecha}}</b></h6>
                </div> 
                <div class="form-group  col-md-2 col-lg-3">
                <h6><b><i style="color: red" class="fas fa-user"></i><a style="color: red" href="{{ route('publicacion.show', $proyecto->id) }}" > {{$proyecto->user->name}}</a></b></h6>
                </div>   
                <div class="form-group  col-md-2 col-lg-1">
                <h6 style="color: white"><b><i class="fas fa-comment"></i> 0</b></h6>
                </div>      


                </div>
                </div>                
                </div>
                </div>


        </div>
    </div>

                        @endforeach

        </div>

        </div>
</section>

@endsection
