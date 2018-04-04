<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    //
    protected $table='pais';
    protected $filable=[
      'nombre',
      'id'
    ];

    public function provincia()
    {
        return $this->hasMany('App\Provincia');
    }

}
