<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {

    protected $table = 'restaurant';
    public $timestamps = false;

    protected $fillable = ['NAME','ADDRESS','PHONE','EMAIL','TIME_OPEN','LATITUDE','LONGITUDE','BIO','USERNAME','PASSWORD','STATUS'];
    protected $hidden = ['TIME_OPEN'];

    public function time_open()
    {
      return $this->hasOne('Models\Time_open', 'NO', 'TIME_OPEN');
    }

    public function menu()
    {
      return $this->hasMany('Models\Menu', 'RESTAURANT_NO', 'NO');
    }
}

?>
