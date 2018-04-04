<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    protected $table='videos';
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
