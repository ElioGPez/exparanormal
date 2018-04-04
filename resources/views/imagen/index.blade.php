@extends('template.main')
@section('titulo')

Titulo de la pagina

@endsection
@section('cuerpo')

<div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="{{ asset('storage/Abel.jpg') }}">
        <img src="{{ asset('storage/Abel.jpg') }}" style="width:20%" class="img-thumbnail" alt="Cinque Terre">
        <div class="caption">
          <p>Lorem ipsum...</p>
        </div>
      </a>
    </div>
  </div>

</div>
<div class="container">
  
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <form method="POST" action="{{ route('imagen.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
 <img src="{{ asset('storage/Abel.jpg') }}"  width="1000" height="50">

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
  <label class="custom-file-label" for="customFileLang">Subir imagen...</label>
</div>

                <div class="form-group">
 <input name="file-input" id="file-input" type="file" />
   <br />
   <img id="imgSalida" width="52%" height="52%" src="" />
                </div>
@endsection