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

    public function user_rate()
    {
      return $this->hasMany('Models\User_rate', 'USER_NO', 'NO');
    }
}
?>
