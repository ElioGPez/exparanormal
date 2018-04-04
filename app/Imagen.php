<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {

    protected $table='imagens';
    protected $filable=[
      'vinculo',
      'id',
      'ubicacion'
    ];


    public function publicacion()
    {
        return $this->belongsToMany('App\Publicacion');
    }
}
