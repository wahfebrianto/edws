<?php

namespace Models;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
  function __construct($dbname) {
    $capsule = new Capsule;
    $capsule->addConnection([
     'driver' => DBDRIVER,
     'host' => DBHOST,
     'database' => $dbname,
     'username' => DBUSER,
     'password' => DBPASS,
     'charset' => 'utf8',
     'collation' => 'utf8_unicode_ci',
     'prefix' => '',
    ]);
    // Setup the Eloquent ORM…
    $capsule->bootEloquent();
  }
}
