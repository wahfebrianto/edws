<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = ['NAME',
      'ADDRESS',
      'PHONE',
      'DOB',
      'EMAIL',
      'GENDER',
      'USERNAME',
      'PASSWORD',
      'STATUS'
    ];
}
?>
