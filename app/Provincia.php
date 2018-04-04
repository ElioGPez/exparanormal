<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model {

    //
    protected $table='provincias';
    protected $filable=[
      'nombre',
      'id',
      'pais_id'
    ];


    public function localidad()
    {
        return $this->hasMany('App\Localidad');
    }
    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
}
