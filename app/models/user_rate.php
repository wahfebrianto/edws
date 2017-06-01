<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class User_rate extends Model {

    protected $table = 'user_rate';
    public $timestamps = false;

    protected $fillable = ["USER_NO", "RESTAURANT_NO", "RATE"];

    public function user()
    {
      return $this->belongsTo('Models\User', 'USER_NO', 'NO');
    }

    public function restaurant()
    {
      return $this->belongsTo('Models\Restaurant', 'RESTAURANT_NO', 'NO');
    }

}

?>
