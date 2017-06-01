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
    "PASSWORD" => $request->getParam("PASSWORD"),
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

$app->run();
