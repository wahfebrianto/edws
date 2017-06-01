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
  $response->getBody()->write(json_encode(Restaurant::with("time_open")->get()));
  return $response;
});

$app->post('/company/register',function($request,$response){
  new Database("dbrestaurant");
  $newCompany = [
    "NAME" => $request->getParam("NAME"),
    "ADDRESS"  => $request->getParam("ADDRESS"),
    "PHONE" => $request->getParam("PHONE"),
    "USERNAME"  => $request->getParam("USERNAME"),
    "PASSWORD" => crypt($request->getParam("PASSWORD"),CRYPTKEY),
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
      'PASSWORD' => $request->getParam('PASSWORD'),
      'STATUS' => 1
    ];
    $restaurant  = Restaurant::create($newRestaurant);
  } catch (Exception $e) {
    echo "Error : ".$e;
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
      'PASSWORD' => $request->getParam('PASSWORD'),
      'STATUS' => 1
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
  } catch (Exception $e) {
    echo "Error : ".$e;
  }
});

//effendy

$app->get('/restaurant/findRestaurant',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $getArray = $request->getParams();
    $whereArray = array();
    $restaurant = Restaurant::where('1','=','1');
    if(array_key_exists('name',$getArray)){
        $name = $getArray['name'];
        $restaurant = $restaurant->where(['NAME'=>$name]);
    }
    if(array_key_exists('latitude',$getArray)){
        $latitude = $getArray['latitude'];
        $restaurant = $restaurant->where(['LATITUDE'=>$latitude]);
    }
    if(array_key_exists('longitude',$getArray)){
        $longitude = $getArray['longitude'];
        $restaurant = $restaurant->where(['LONGITUDE'=>$longitude]);
    }
    $response->getBody()->write(json_encode($restaurant));
    /*
    if(array_key_exists('latitudeHere',$getArray) && array_key_exists('longitudeHere',$getArray) && array_key_exists('isNearby',$getArray)){
        $latitudeHere = $getArray['latitudeHere'];
        $longitudeHere = $getArray['longitudeHere'];
        $isNearby = $getArray['isNearby'];
        if($isNearby == 1){

        }
    }
    if(array_key_exists('time_now',$getArray)){
        $time_now = $getArray['time_now'];
    }
    if(array_key_exists('isOpen',$getArray)){
        $isOpen = $getArray['isOpen'];
    }

    */

    //engkok ae sek


});

$app->get('/restaurant/findByMenu/{menuName}/{minimum_price}/{maximum_price}/{time_now}/{isOpen}',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('APIKEY');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
});

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
