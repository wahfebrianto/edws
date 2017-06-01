<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $table = 'menu';
    public $timestamps = false;

    protected $fillable = [
      'NAME', 'PRICE', 'RECOMMENDED', 'NOTE', 'RESTAURANT_NO'
    ];

    protected $hidden = ['RESTAURANT_NO'];

    public function restaurant()
    {
      return $this->belongsTo('Models\Restaurant', 'RESTAURANT_NO', 'NO');
    }

}

?>
