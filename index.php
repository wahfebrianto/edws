<?php
require 'vendor/autoload.php';
require 'config.php';
require 'database_init.php';

use Models\User;
use Models\Company;
use Models\Database;
use Models\Restaurant;
use Models\Menu;
use Models\Time_open;
use Models\User_like;
use Models\User_rate;

$app = new \Slim\App;

$app->get('/company', function($request, $response) {
  new Database("dbrestaurant");
  $response->getBody()->write(json_encode(Company::all()));
  return $response;
});

$app->get('/restaurant', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('APIKEY');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $response->getBody()->write(json_encode(Restaurant::with("time_open")->with("menu")->get()));
  return $response;
});

$app->get('/restaurant/{id}', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('APIKEY');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $id = $request->getAttribute('id');
  $response->getBody()->write(json_encode(Restaurant::with("time_open")->with("menu")->where(["NO"=>$id])->get()));
  return $response;
});

$app->get('/user', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('APIKEY');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $response->getBody()->write(json_encode(User::get()));
  return $response;
});

$app->get('/menu', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('APIKEY');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $response->getBody()->write(json_encode(Menu::with("restaurant")->get()));
  return $response;
});

$app->post('/company/register',function($request,$response){
  new Database("dbrestaurant");
  $newCompany = [
    "NAME" => $request->getParam("NAME"),
    "ADDRESS"  => $request->getParam("ADDRESS"),
    "PHONE" => $request->getParam("PHONE"),
    "USERNAME"  => $request->getParam("USERNAME"),
    "PASSWORD" => MD5($request->getParam("PASSWORD")),
    "APIKEY" => md5($request->getParam("USERNAME").$request->getParam("PASSWORD"))
  ];
  $company = Company::create($newCompany);
  createCompany($company->USERNAME);
});

$app->post('/restaurant/register', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    //insert timeopen sek an
    //generate semua timeopen 1 minggu
    $myArray = [
      'TIME_OPEN_MONDAY'=> $request->getParam("TIME_OPEN_MONDAY"),
      'TIME_CLOSE_MONDAY'=> $request->getParam("TIME_CLOSE_MONDAY"),
      'TIME_OPEN_TUESDAY'=> $request->getParam("TIME_OPEN_TUESDAY"),
      'TIME_CLOSE_TUESDAY'=> $request->getParam("TIME_CLOSE_TUESDAY"),
      'TIME_OPEN_WEDNESDAY'=> $request->getParam("TIME_OPEN_WEDNESDAY"),
      'TIME_CLOSE_WEDNESDAY'=> $request->getParam("TIME_CLOSE_WEDNESDAY"),
      'TIME_OPEN_THURSDAY'=> $request->getParam("TIME_OPEN_THURSDAY"),
      'TIME_CLOSE_THURSDAY'=> $request->getParam("TIME_CLOSE_THURSDAY"),
      'TIME_OPEN_FRIDAY'=> $request->getParam("TIME_OPEN_FRIDAY"),
      'TIME_CLOSE_FRIDAY'=> $request->getParam("TIME_CLOSE_FRIDAY"),
      'TIME_OPEN_SATURDAY'=> $request->getParam("TIME_OPEN_SATURDAY"),
      'TIME_CLOSE_SATURDAY'=> $request->getParam("TIME_CLOSE_SATURDAY"),
      'TIME_OPEN_SUNDAY'=> $request->getParam("TIME_OPEN_SUNDAY"),
      'TIME_CLOSE_SUNDAY'=> $request->getParam("TIME_CLOSE_SUNDAY")
    ];
    $time_open = Time_open::create($myArray);
    //timeopen selesai
    $newRestaurant = [
      'NAME' => $request->getParam('NAME'),
      'ADDRESS' => $request->getParam('ADDRESS'),
      'PHONE' => $request->getParam('PHONE'),
      'EMAIL' => $request->getParam('EMAIL'),
      'TIME_OPEN' => $time_open->id,
      'LATITUDE' => $request->getParam('LATITUDE'),
      'LONGITUDE' => $request->getParam('LONGITUDE'),
      'BIO' => $request->getParam('BIO'),
      'USERNAME' => $request->getParam('USERNAME'),
      'PASSWORD' => MD5($request->getParam('PASSWORD')),
      'STATUS' => $request->getParam('STATUS')
    ];
    $restaurant  = Restaurant::create($newRestaurant);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->put('/restaurant/update/{id}', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');

    $newRestaurant = [
      'NAME' => $request->getParam('NAME'),
      'ADDRESS' => $request->getParam('ADDRESS'),
      'PHONE' => $request->getParam('PHONE'),
      'EMAIL' => $request->getParam('EMAIL'),
      'LATITUDE' => $request->getParam('LATITUDE'),
      'LONGITUDE' => $request->getParam('LONGITUDE'),
      'BIO' => $request->getParam('BIO'),
      'USERNAME' => $request->getParam('USERNAME'),
      'PASSWORD' => MD5($request->getParam('PASSWORD')),
      'STATUS' => $request->getParam('STATUS')
    ];
    Restaurant::where(['NO'=>$id])->update($newRestaurant);
    $restaurant = Restaurant::where(['NO'=>$id])->first();
    //insert timeopen sek an
    //generate semua timeopen 1 minggu
    $myArray = [
      'TIME_OPEN_MONDAY'=> $request->getParam("TIME_OPEN_MONDAY"),
      'TIME_CLOSE_MONDAY'=> $request->getParam("TIME_CLOSE_MONDAY"),
      'TIME_OPEN_TUESDAY'=> $request->getParam("TIME_OPEN_TUESDAY"),
      'TIME_CLOSE_TUESDAY'=> $request->getParam("TIME_CLOSE_TUESDAY"),
      'TIME_OPEN_WEDNESDAY'=> $request->getParam("TIME_OPEN_WEDNESDAY"),
      'TIME_CLOSE_WEDNESDAY'=> $request->getParam("TIME_CLOSE_WEDNESDAY"),
      'TIME_OPEN_THURSDAY'=> $request->getParam("TIME_OPEN_THURSDAY"),
      'TIME_CLOSE_THURSDAY'=> $request->getParam("TIME_CLOSE_THURSDAY"),
      'TIME_OPEN_FRIDAY'=> $request->getParam("TIME_OPEN_FRIDAY"),
      'TIME_CLOSE_FRIDAY'=> $request->getParam("TIME_CLOSE_FRIDAY"),
      'TIME_OPEN_SATURDAY'=> $request->getParam("TIME_OPEN_SATURDAY"),
      'TIME_CLOSE_SATURDAY'=> $request->getParam("TIME_CLOSE_SATURDAY"),
      'TIME_OPEN_SUNDAY'=> $request->getParam("TIME_OPEN_SUNDAY"),
      'TIME_CLOSE_SUNDAY'=> $request->getParam("TIME_CLOSE_SUNDAY")
    ];
    Time_open::where(['NO'=>$restaurant->TIME_OPEN])->update($myArray);
    //timeopen selesai
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->post('/user/register', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $newUser = [
      'NAME' => $request->getParam('NAME'),
      'ADDRESS' => $request->getParam('ADDRESS'),
      'PHONE' => $request->getParam('PHONE'),
      'DOB' => $request->getParam('DOB'),
      'EMAIL' => $request->getParam('EMAIL'),
      'GENDER' => $request->getParam('GENDER'),
      'USERNAME' => $request->getParam('USERNAME'),
      'PASSWORD' => MD5($request->getParam('PASSWORD')),
      'STATUS' => $request->getParam('STATUS')
    ];
    $user = User::create($newUser);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->put('/user/update/{id}', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');

    $myArray = [];
    if(!($request->getParam('NAME')===null))
    {
      $myArray += ['NAME' => $request->getParam('NAME')];
    }
    if(!($request->getParam('ADDRESS')===null))
    {
      $myArray += ['ADDRESS' => $request->getParam('ADDRESS')];
    }
    if(!($request->getParam('PHONE')===null))
    {
      $myArray += ['PHONE' => $request->getParam('PHONE')];
    }
    if(!($request->getParam('DOB')===null))
    {
      $myArray += ['DOB' => $request->getParam('DOB')];
    }
    if(!($request->getParam('EMAIL')===null))
    {
      $myArray += ['EMAIL' => $request->getParam('EMAIL')];
    }
    if(!($request->getParam('GENDER')===null))
    {
      $myArray += ['GENDER' => $request->getParam('GENDER')];
    }
    if(!($request->getParam('USERNAME')===null))
    {
      $myArray += ['USERNAME' => $request->getParam('USERNAME')];
    }
    if(!($request->getParam('PASSWORD')===null))
    {
      $myArray += ['PASSWORD' => MD5($request->getParam('PASSWORD'))];
    }
    if(!($request->getParam('STATUS')===null))
    {
      $myArray += ['STATUS' => $request->getParam('STATUS')];
    }
    User::where(['NO'=>$id])->update($myArray);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->post('/menu/register', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $newMenu = [
      'NAME' => $request->getParam('NAME'),
      'PRICE' => $request->getParam('PRICE'),
      'RECOMMENDED' => $request->getParam('RECOMMENDED'),
      'NOTE' => $request->getParam('NOTE'),
      'RESTAURANT_NO' => $request->getParam('RESTAURANT_NO')
    ];
    $menu = Menu::create($newMenu);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->put('/menu/update/{id}', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');
    $myArray = [];
    if(!($request->getParam('NAME')===null))
    {
      $myArray += ['NAME' => $request->getParam('NAME')];
    }
    if(!($request->getParam('PRICE')===null))
    {
      $myArray += ['PRICE' => $request->getParam('PRICE')];
    }
    if(!($request->getParam('RECOMMENDED')===null))
    {
      $myArray += ['RECOMMENDED' => $request->getParam('RECOMMENDED')];
    }
    if(!($request->getParam('NOTE')===null))
    {
      $myArray += ['NOTE' => $request->getParam('NOTE')];
    }
    Menu::where(['NO'=>$id])->update($myArray);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->delete('/menu/delete/{id}', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');
    Menu::where(['NO'=>$id])->delete();
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});
//effendy
function rad($x){
    return $x * (3.14) / 180;
}

function haversine($p1,$p2){
    $r = 6378137;
    $dLat = rad($p2['latitude'] - $p1['latitude']);
    $dLong = rad($p2['longitude'] - $p1['longitude']);
    $a = Math.sin($dLat/2)*Math.sin($dLat/2)+Math.cos(rad($p1['latitude'])) * Math.cos(rad($p2['latitude'])) *
        Math.sin(dLong / 2) * Math.sin(dLong / 2);
    $c = 2 * Math.atan2(Math.sqrt($a),Math.sqrt(1-$a));
    return $r*$c;
}

$app->post('/user/login',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $username = $request->getParam('username');
    $password = crypt($request->getParam('password'),CRYPTKEY);
    $user = User::where(['USERNAME'=>$username,'PASSWORD'=>$password])->get();
    if(sizeof($user)>0){
        $response->getBody()->write(json_encode($user));
    }else{
        $response->getBody()->write("No Result Found");
    }
});
$app->post('/restaurant/login',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $username = $request->getParam('username');
    $password = crypt($request->getParam('password'),CRYPTKEY);
    $restaurant = Restaurant::where(['USERNAME'=>$username,'PASSWORD'=>$password])->get();
    if(sizeof($restaurant)>0){
        $response->getBody()->write(json_encode($restaurant));
    }else{
        $response->getBody()->write("No Result Found");
    }
});
$app->run();
