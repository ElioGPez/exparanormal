<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model {

    //
    protected $table='publicacions';
    protected $filable=[
      'id',
      'titulo',
      'autor',
      'cuerpo',
      'fecha',
      'puntaje',
      'parrafos',
      'categoria_id',
      'localidad_id',
      'usuario_id',
      'imagenPerfil'
    ];

    public function comentario(){
      return $this->hasMany('App\Comentario');
    }
    public function user(){
      return $this->belongsTo('App\User','usuario_id');
    }
    public function localidad(){
      return $this->belongsTo('App\Localidad');
    }
    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }

    public function imagen()
    {
        return $this->belongsToMany('App\Imagen');
    }
    public function video()
    {
        return $this->belongsToMany('App\Video');
    }
    public function puntuacion()
    {
        return $this->belongsToMany('App\Puntuacion');
    }

  }