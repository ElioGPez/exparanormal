@extends('template.main')
@section('titulo')

Titulo de la pagina

@endsection
@section('cuerpo')

 
<div class="container">

    <div class="row" style="border-style: solid;border-color: white;border-width: thin;">
        <div class="col-md-12" style="color: white">
            <div class="form-group">
                <h2 style="padding-top: 20px;" class="text-center">{{$publicacion->titulo}}</h2>
            </div>
            <!--br-->
            <div class="form-group">
                <b><i style="color: red" class="fas fa-user"></i><a style="color: red" href="{{ route('publicacion.show', $publicacion->id) }}" > {{$publicacion->user->name}}</a></b>
            </div>
            <div class="form-group">
                <img src="/storage/{{$publicacion->imagenPerfil}}" style="width:100%" class="img-thumbnail" alt="Cinque Terre">
            </div>
            <div class="form-group">
                <p style="font-size: 20px">{{$publicacion->cuerpo}}</p>
            </div>
 
        </div>
    </div>
    <div class="row" style="border-style: solid;border-color: white;border-width: thin;margin-top: 50px;">
        <div class="col-md-12" style="color: white">
            <div class="form-group">
                <h4 style="padding-top: 20px;" class="text-center">COMENTARIOS</h4>
            </div>
            <div class="form-group" id="divComentario">

                @if($publicacion->comentario->count()) 
                @foreach($publicacion->comentario as $coment)
                <div  class="col-md-12" style="border-style: solid;border-width: thin;border-color: gray;"> 
                    <div class="row" >
                        <div class="form-group col-lg-2">{{$coment->usuario->name}}</div>
                        <div class="form-group col-lg-10">{{$coment->comentario}}</div>
                    </div>
                </div>
                @endforeach
                @else
                <h5 style="padding-top: 20px;" class="text-center">Aun no hay comentarios</h5>
                @endif
            </div>
       <form  class="form-control" action="{{ route('comentario.ajax') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group"> 
                <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribir comentario..."></textarea>    
                <br>
                <div class="form-group">
                    <button type="submit" id="btnComentar" class="btn btn-primary">COMENTAR</button>
                </div>        
            </div>
        </form>
        </div>
    </div>
</div>

@section('scripts')
<script>

   
</script>
<script>
$(document).ready(function(){
//Para seleccionar autor
    //Detecta el cambio al seleccionar opcion en el desplegable

      $("#btnComentar").click(function (e) {
       e.preventDefault();
       var comentar = $('#comentario').val();
       var token = $("input[name='_token']").val();
      // alert("{{url('comentario/ajaxComentario')}}");
      var user ="{{Auth::user()->name}}";
      var _user ="{{Auth::user()->id}}";
      var _publicacion ="{{$publicacion->id}}";
      alert(_user+"-"+_publicacion);
      $.ajax({

        type: "post",
        url: " {{ route('comentario.ajax') }}",
        data: {
            "_token": token,
            comentar: comentar,
            user : _user,
            publicacion : _publicacion
        }, success: function (msg) {
          if($.isEmptyObject(msg.error)){
                            alert("Se ha realizado el POST con exito ");
        $('#divComentario').append(
          //'<option value="'+el.id+'">'+el.nombre+'</option>'
          '<div  class="col-md-12" style="border-style: solid;border-width: thin;border-color: gray;">' +
                    '<div class="row" >'+
                        '<div class="form-group col-lg-2">'+user+'</div>'+
                        '<div class="form-group col-lg-10">'+comentar+'</div>'+
                    '</div>'+
          '</div>',);


        }else{
                          alert("Se ha realizado el POST con error ");

        }
        }
      });
  });

});
  
</script>
@endsection
@endsection
