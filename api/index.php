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
    $a = sin($dLat/2)*sin($dLat/2)+cos(rad($p1['latitude'])) * cos(rad($p2['latitude'])) *
        sin($dLong / 2) * sin($dLong / 2);
    $c = 2 * atan2(sqrt($a),sqrt(1-$a));
    if( $r*$c < 5000){
		return true;
	}
	return false;
}

$app = new \Slim\App;

$app->get('/company/findAll', function($request, $response) {
  new Database("dbrestaurant");
  $response->getBody()->write(json_encode(Company::all()));
  return $response;
});

$app->get('/restaurant/findAll', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $restaurant["result"] = Restaurant::with("time_open")->with("menu")->get();
  $response->getBody()->write(json_encode($restaurant));
  return $response;
});

$app->get('/restaurant/findById/{id}', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $id = $request->getAttribute('id');
  $restaurant["result"] = Restaurant::with("time_open")->with("menu")->where(["NO"=>$id])->first();
  $response->getBody()->write(json_encode($restaurant));
  return $response;
});

$app->get('/restaurant/rating/{id}', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $id = $request->getAttribute('id');
  $restaurant_rate = Restaurant::where(["NO" => $id])->first()->getRating();
  $response->getBody()->write(json_encode(["Rating" => (($restaurant_rate==null)?0:$restaurant_rate)]));
  return $response;
});

$app->get('/user/findById/{id}', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $id = $request->getAttribute('id');
  $response->getBody()->write(json_encode(["result"=>User::where(["NO"=>$id])->first()]));
  return $response;
});

$app->get('/user/findAll', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $response->getBody()->write(json_encode(User::get()));
  return $response;
});

$app->get('/menu/findAll', function($request, $response) {
  new Database("dbrestaurant");
  $apikey = $request->getHeader('apikey');
  new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
  $response->getBody()->write(json_encode(Menu::with("restaurant")->get()));
  return $response;
});

$app->post('/company/register',function($request,$response){
  new Database("dbrestaurant");
  $param = $request->getParsedBody();
  $newCompany = [
    "NAME" => $param["name"],
    "ADDRESS"  => $param["address"],
    "PHONE" => $param["phone"],
    "USERNAME"  => $param["username"],
    "PASSWORD" => crypt($param["password"],CRYPTKEY),
    "APIKEY" => md5($param["username"].$param["password"])
  ];
  $company = Company::create($newCompany);
  createCompany($company->USERNAME);
});

$app->post('/restaurant/register', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    //insert timeopen sek an
    //generate semua timeopen 1 minggu
    $myArray = [
      'TIME_OPEN_MONDAY'=> $param["time_open_monday"],
      'TIME_CLOSE_MONDAY'=> $param["time_close_monday"],
      'TIME_OPEN_TUESDAY'=> $param["time_open_tuesday"],
      'TIME_CLOSE_TUESDAY'=> $param["time_close_tuesday"],
      'TIME_OPEN_WEDNESDAY'=> $param["time_open_wednesday"],
      'TIME_CLOSE_WEDNESDAY'=> $param["time_close_wednesday"],
      'TIME_OPEN_THURSDAY'=> $param["time_open_thursday"],
      'TIME_CLOSE_THURSDAY'=> $param["time_close_thursday"],
      'TIME_OPEN_FRIDAY'=> $param["time_open_friday"],
      'TIME_CLOSE_FRIDAY'=> $param["time_close_friday"],
      'TIME_OPEN_SATURDAY'=> $param["time_open_saturday"],
      'TIME_CLOSE_SATURDAY'=> $param["time_close_saturday"],
      'TIME_OPEN_SUNDAY'=> $param["time_open_sunday"],
      'TIME_CLOSE_SUNDAY'=> $param["time_close_sunday"]
    ];
    $time_open = Time_open::create($myArray);
    //timeopen selesai
    $newRestaurant = [
      'NAME' => $param['name'],
      'ADDRESS' => $param['address'],
      'PHONE' => $param['phone'],
      'EMAIL' => $param['email'],
      'TIME_OPEN' => $time_open->id,
      'LATITUDE' => $param['latitude'],
      'LONGITUDE' => $param['longitude'],
      'BIO' => $param['bio'],
      'USERNAME' => $param['username'],
      'PASSWORD' => crypt($param['password'],CRYPTKEY),
      'STATUS' => $param['status']
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
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');
  $myArray = $request->getParsedBody();
	$keyCollection = array_keys($myArray);
	$fieldList = [
		"name"=>'1',
		"address"=>'1',
		"phone"=>'1',
		"email"=>'1',
		"time_open"=>'1',
		"latitude"=>'1',
		"longitude"=>'1',
		"bio"=>'1',
		"username"=>'1',
		"password"=>'1',
		"status"=>'1'
	];
	$fieldListTime = [
		"time_open_monday" => "1",
		"time_open_tuesday" => "1",
		"time_open_wednesday" => "1",
		"time_open_thursday" => "1",
		"time_open_friday" => "1",
		"time_open_saturday" => "1",
		"time_open_sunday" => "1",
		"time_close_monday" => "1",
		"time_close_tuesday" => "1",
		"time_close_wednesday" => "1",
		"time_close_thursday" => "1",
		"time_close_friday" => "1",
		"time_close_saturday" => "1",
		"time_close_sunday" => "1"
	];
	$newRestaurant = array();
	for($i=0;$i<sizeof($keyCollection);$i++){
		if(array_key_exists($keyCollection[$i],$myArray) && array_key_exists($keyCollection[$i],$fieldList)){
			echo strpos($keyCollection[$i],'time_');
			$newRestaurant[$keyCollection[$i]] = $myArray[$keyCollection[$i]];
			if($keyCollection[$i] == "password"){
				$newRestaurant[$keyCollection[$i]] = crypt($myArray[$keyCollection[$i]],CRYPTKEY);
			}
		}
	}
	if(sizeof($newRestaurant)>0){
		Restaurant::where(['NO'=>$id])->update($newRestaurant);
	}
    $restaurant = Restaurant::where(['NO'=>$id])->first();
	$myArray1 = array();
	for($i=0;$i<sizeof($keyCollection);$i++){
		if(array_key_exists($keyCollection[$i],$myArray) && array_key_exists($keyCollection[$i],$fieldListTime)){
			$myArray1[$keyCollection[$i]] = $myArray[$keyCollection[$i]];
		}
	}
	if(sizeof($myArray1) > 0){
		Time_open::where(['NO'=>$restaurant->TIME_OPEN])->update($myArray1);
	}
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
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    $newUser = [
      'NAME' => $param['name'],
      'ADDRESS' => $param['address'],
      'PHONE' => $param['phone'],
      'DOB' => $param['dob'],
      'EMAIL' => $param['email'],
      'GENDER' => $param['gender'],
      'USERNAME' => $param['username'],
      'PASSWORD' => crypt($param['password'],CRYPTKEY),
      'STATUS' => $param['status']
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
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');
    $param = $request->getParsedBody();
    $myArray = [];
    if(!($param['name']===null))
    {
      $myArray += ['NAME' => $param['name']];
    }
    if(!($param['address']===null))
    {
      $myArray += ['ADDRESS' => $param['address']];
    }
    if(!($param['phone']===null))
    {
      $myArray += ['PHONE' => $param['phone']];
    }
    if(!($param['dob']===null))
    {
      $myArray += ['DOB' => $param['dob']];
    }
    if(!($param['email']===null))
    {
      $myArray += ['EMAIL' => $param['email']];
    }
    if(!($param['gender']===null))
    {
      $myArray += ['GENDER' => $param['gender']];
    }
    if(!($param['username']===null))
    {
      $myArray += ['USERNAME' => $param['username']];
    }
    if(!($param['password']===null))
    {
      $myArray += ['PASSWORD' => crypt($param['password'],CRYPTKEY)];
    }
    if(!($param['status']===null))
    {
      $myArray += ['STATUS' => $param['status']];
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
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    $newMenu = [
      'NAME' => $param['name'],
      'PRICE' => $param['price'],
      'RECOMMENDED' => $param['recommended'],
      'NOTE' => $param['note'],
      'RESTAURANT_NO' => $param['restaurant_no']
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
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $id = $request->getAttribute('id');
    $param = $request->getParsedBody();
    $myArray = [];
    if(!($param['name']===null))
    {
      $myArray += ['NAME' => $param['name']];
    }
    if(!($param['price']===null))
    {
      $myArray += ['PRICE' => $param['price']];
    }
    if(!($param['recommended']===null))
    {
      $myArray += ['RECOMMENDED' => $param['recommended']];
    }
    if(!($param['note']===null))
    {
      $myArray += ['NOTE' => $param['note']];
    }
    Menu::where(['NO'=>$id])->update($myArray);
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->get('/getrate',function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
	$myArray = [
      "USER_NO" => $request->getParam("user_no"),
      "RESTAURANT_NO" => $request->getParam("restaurant_no")
    ];
	$rate = User_rate::select("rate")->where($myArray)->first()["rate"];
	if(isset($rate))
		$response->getBody()->write(json_encode(["result"=>$rate]));
	else
		$response->getBody()->write(json_encode(["result"=>0]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["result"=>"error"]));
    return $response;
  }
});

$app->delete('/menu/delete/{id}', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
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

$app->post('/rate', function($request,$response){
  try {
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    $myArray = [
      "USER_NO" => $param["user_no"],
      "RESTAURANT_NO" => $param["restaurant_no"]
    ];
    $user_rate = User_rate::where($myArray)->first();
    if($user_rate===null)
    {
      $myArray += ["RATE" => $param["RATE"]];
      User_rate::create($myArray);
    }
    else {
      User_rate::where($myArray)->update(["RATE" => $param["RATE"]]);
    }
    $response->getBody()->write(json_encode(["success"=>true]));
    return $response;
  } catch (Exception $e) {
    $response->getBody()->write(json_encode(["success"=>false, "error"=>$e]));
    return $response;
  }
});

$app->post('/user/login',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    $username = $param['username'];
    $password = crypt($param['password'],CRYPTKEY);
    $user["result"] = User::where(['USERNAME'=>$username,'PASSWORD'=>$password])->first();
    if(sizeof($user)>0){
        $response->getBody()->write(json_encode($user));
    }else{
        $response->getBody()->write("No Result Found");
    }
});

$app->post('/restaurant/login',function($request,$response){
    new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $param = $request->getParsedBody();
    $username = $param['username'];
    $password = crypt($param['password'],CRYPTKEY);
    $restaurant["result"] = Restaurant::where(['USERNAME'=>$username,'PASSWORD'=>$password])->first();
    if(sizeof($restaurant['result'])>0){
        $response->getBody()->write(json_encode($restaurant));
    }else{
        $response->getBody()->write("No Result Found");
    }
});

$app->get('/restaurant/findRestaurant',function($request,$response){
	new Database("dbrestaurant");
    $apikey = $request->getHeader('apikey');
    new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
    $getArray = $request->getParams();
    $restaurant = Restaurant::where('NAME','LIKE','%%');
    if(array_key_exists('name',$getArray)){
        $name = $getArray['name'];
        $restaurant = $restaurant->where('NAME','LIKE','%'.$name.'%');
    }
    if(array_key_exists('latitude',$getArray)){
        $latitude = $getArray['latitude'];
        $restaurant = $restaurant->where('LATITUDE',$latitude);
    }
    if(array_key_exists('longitude',$getArray)){
        $longitude = $getArray['longitude'];
        $restaurant = $restaurant->where('LONGITUDE',$longitude);
    }
	if(array_key_exists('time_now',$getArray) && array_key_exists('day',$getArray)){
		//time_now format hh:mm:ss
		$restaurant = $restaurant->join('time_open','time_open.NO','=','restaurant.TIME_OPEN')->where('TIME_OPEN_'.strtoupper($getArray['day']),'<=',$getArray['time_now'])->where('TIME_CLOSE_'.strtoupper($getArray['day']),'>=',$getArray['time_now']);
	}
    $response->getBody()->write(json_encode($restaurant->get()));
});

$app->get('/restaurant/findNearbyRestaurant',function($request,$response){
	try{
		$getArray = $request->getParams();
		if(array_key_exists('latitudeHere',$getArray) && array_key_exists('longitudeHere',$getArray)){
			//time_now format hh:mm:ss
			new Database("dbrestaurant");
			$apikey = $request->getHeader('apikey');
			new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
			$latHere = $getArray['latitudeHere'];
			$longHere = $getArray['longitudeHere'];
			$restaurant["result"]  = Restaurant::all()->filter(function($event) use ($getArray){
				$napp = array();
				$napp['latitude'] = $event->LATITUDE;
				$napp['longitude'] = $event->LONGITUDE;
				$mapp = array();
				$mapp['latitude'] = $getArray['latitudeHere'];
				$mapp['longitude'] = $getArray['longitudeHere'];
				return haversine($napp,$mapp);
			});
			$response->getBody()->write(json_encode($restaurant));
		}
		else{
			$response->getBody()->write("Parameters not valid");
		}
	}
	catch(Exception $e){
		$response->getBody()->write($e);
	}
});

$app->get('/restaurant/findByMenu',function($request,$response){

	$getArray = $request->getParams();
	new Database("dbrestaurant");
	$apikey = $request->getHeader('apikey');
	new Database("dbrestaurant_".Company::where(["APIKEY" => $apikey])->value('username'));
	$menu = Menu::where('NAME','LIKE','%%');
	$restaurant = Restaurant::where('NAME','LIKE','%%');
	if(array_key_exists('menuName',$getArray)){
		$restaurant = $restaurant->whereIn('NO', function($query) use ($getArray){
			$query->select('RESTAURANT_NO')->from('menu')->where('NAME','LIKE','%'.$getArray['menuName'].'%');
		});
	}
	if(array_key_exists('minPrice',$getArray) && array_key_exists('maxPrice',$getArray)){
		$restaurant = $restaurant->whereIn('NO', function($query) use ($getArray){
			$query->select('RESTAURANT_NO')->from('menu')->where('price','<=',$getArray['maxPrice'])->where('price','>=',$getArray['minPrice']);
		});
	}
	echo json_encode($restaurant->with('menu')->get());
});

$app->get('/promo/findAll',function($request,$response){
	$files["result"] = glob("uploads/promo/*");
	foreach($files["result"] as $file){
		$tmp = $file;
		$stringResult = explode('/',$file);
		$time = explode("_",$stringResult[2]);
		$time = explode(".",$time[1]);
		if($time[0] <= gettimeofday()["sec"]*1000){
			unlink($file);
			$file = "";
			$files["result"] = str_replace($tmp,"",$files["result"]);
		}
	}
	$response->getBody()->write(json_encode($files));
	return $response;
});

$app->get('/encrypt/{pass}',function($request,$response){
	$result["result"] = crypt($request->getAttribute("pass"),CRYPTKEY);
	$response->getBody()->write(json_encode($result));
	return $response;
});

$app->run();
