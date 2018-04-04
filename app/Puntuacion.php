<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model {

    protected $table='imagens';
    protected $filable=[
      'puntos',
      'id'
    ];


    public function publicacion()
    {
        return $this->belongsToMany('App\Publicacion');
    }
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

}
