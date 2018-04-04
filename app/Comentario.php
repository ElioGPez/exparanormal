<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    //
    protected $table='comentarios';
    protected $filable=[
      'comentario',
      'id',
      'publicacion_id',
      'usuario_id'
    ];


    public function publicacion()
    {
        return $this->belongsTo('App\Publicacion');
    }
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}
