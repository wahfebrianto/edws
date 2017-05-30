<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Time_open extends Model {

    protected $table = 'time_open';
    public $timestamps = false;

    protected $fillable = [
      'TIME_OPEN_MONDAY',
      'TIME_CLOSE_MONDAY',
      'TIME_OPEN_TUESDAY',
      'TIME_CLOSE_TUESDAY',
      'TIME_OPEN_WEDNESDAY',
      'TIME_CLOSE_WEDNESDAY',
      'TIME_OPEN_THURSDAY',
      'TIME_CLOSE_THURSDAY',
      'TIME_OPEN_FRIDAY',
      'TIME_CLOSE_FRIDAY',
      'TIME_OPEN_SATURDAY',
      'TIME_CLOSE_SATURDAY',
      'TIME_OPEN_SUNDAY',
      'TIME_CLOSE_SUNDAY'
    ];

    protected $hidden = ['NO'];

    public function restaurant()
    {
      return $this->belongsTo('Models\Restaurant', 'TIME_OPEN');
    }
}

?>
