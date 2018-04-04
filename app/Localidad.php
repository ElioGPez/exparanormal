<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model {

    protected $table='localidads';
    protected $filable=[
      'nombre',
      'id',
      'provincia_id'
    ];


    public function usuario()
    {
        return $this->hasMany('App\User');
    }
    public function publicacion()
    {
        return $this->hasMany('App\Publicacion');
    }
        public function provincia()
    {
        return $this->belongsTo('App\Pais');
    }

}
