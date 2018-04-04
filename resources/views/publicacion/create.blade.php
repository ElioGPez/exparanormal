@extends('template.main')
@section('titulo')

Titulo de la pagina
 
@endsection
@section('cuerpo')

<div class="container">

    <div class="row">



        <div class="col-md-12">
            <form class="form-control" action="{{ route('publicacion.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
            <h2 class="text-center">Nueva Publicacion</h2>
            <br>

                <div class="form-group">
                    <!--label for="formGroupExampleInput">Nombre</label-->
                    <input id="titulo" name="titulo" type="text" class="form-control"  placeholder="Titulo">
                </div>
                <div class="form-row">
                <div class="form-group  col-md-6">
                    <select class="form-control select-linea" required="" name="autor" id="autor">
                        <option selected="selected" value="">Seleccione un autor</option>
                        <option value="{{ Auth::user()->name }}">Yo</option>
                        <option value="">Otro autor..</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <!--label for="formGroupExampleInput">Nombre</label-->
                    <input id="autorT" name="autorT" type="text" class="form-control"  placeholder="Autor" readonly="readonly">
                </div>
                </div>
 				 <div class="form-group">
  					  <textarea class="form-control" id="cuerpo" name="cuerpo" rows="6" placeholder="Contenido"></textarea>
  				</div>
 
                <div class="form-group">
                    <input id="parrafos" name="parrafos" type="text" class="form-control"  placeholder="N° de Parrafos" value="1" readonly="readonly">
                </div>

                <div class="form-row">
                <div class="form-group  col-md-4">
                    <select class="form-control select-linea" required="" name="id_linea" id="idPais">
                        <option selected="selected" value="">Seleccione un Pais</option>
                        @foreach($paises as $pais)
                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-4">
                    <select class="form-control select-linea" required="" name="id_linea" id="idProvincia">
                        <option selected="selected" value="">Seleccione una Provincia</option>
                    </select>
                </div>
                <div class="form-group  col-md-4">
                    <select class="form-control select-linea" required="" name="id_localidad" id="idLocalidad">
                        <option selected="selected" value="">Seleccione una Localidad</option>
                    </select>
                </div>                
                </div>
                             
                <div class="form-group">
                <input type="file" class="form-control" name="file" >
              </div>


<i class="glyphicon glyphicon-backward"></i>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">AGREGAR</button>
                    <a class="btn btn-link pull-right" href="{{ route('publicacion.show') }}"> Volver</a>

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
        $('#autor').change(function(){
           //   alert('Blabla');
          agregar();
        });
    //Detecta las teclas pulsadas en el textarea con id cuerpo
		$("#cuerpo").keydown(function(event){
//Para escuchar los Enter en el Cuerpo
     	  if(event.which == 13) {
         	nuevoParrafo();
       		}
		  });
//Para obtener el listado de provincias 
    //Detecta cuando se selecciona una opcion en el combo Pais
//          var b= false;

    $('#idPais').change(function(){
      pais = $('#idPais').val();
     // var form = $('#form1');
    //  var url = form.attr('action').replace(':IDPAIS',pais);

     // var ur = "{{ URL::route('pais.consulta',1) }}";
      var url = "/pais/consulta/"+pais;
          /* if(b==true){
                        alert(url);

           }
           b=true;*/
  //AJAX para obtener listado de provincias
      $.ajax({
        url      : url,
        method   : 'GET',
        datetype : "json"
      }).done(function(dato){
      //  $('#idProvincia').text('');
     //   $('#idLocalidad').text('');
      $.each(dato,function(index,el){
        $('#idProvincia').append('<option value="'+el.id+'">'+el.nombre+'</option>',);
      });
      });
    });

    $('#idProvincia').change(function(){
      provincia = $('#idProvincia').val();

      var url = "/provincia/consulta/"+provincia;

  //AJAX para obtener listado de localidades
      $.ajax({
        url      : url,
        method   : 'GET',
        datetype : "json"
      }).done(function(dato){
       // $('#idLocalidad').text('');
      $.each(dato,function(index,el){
        $('#idLocalidad').append('<option value="'+el.id+'">'+el.nombre+'</option>',);
      });
      });
    });

});
  
      var nParrafos=1;

      function agregar(){

      	  var autorOpcion = $("#autor option:selected").text();
          var autor = $("#autor").val();

          if(autorOpcion=='Yo'){
          //	alert(autor);
           $("#autorT").val(autor);
           $("#autorT").attr("readonly","readonly");
          }else
          if(autorOpcion!='Seleccione un autor'){
           $("#autorT").removeAttr("readonly");
          }
		}
		function nuevoParrafo(){
			nParrafos++;
            $("#parrafos").val(nParrafos);
		}

</script>
@endsection
@endsection