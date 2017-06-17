<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $table = 'company';
    public $timestamps = false;
    protected $fillable = [
      "NAME",
      "ADDRESS",
      "PHONE",
      "USERNAME",
      "PASSWORD",
      "APIKEY"
    ];
}

?>
