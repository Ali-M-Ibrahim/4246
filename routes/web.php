<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('first-route',function(){
   return "Hello, i am the first route";
});

Route::get('second-route',function(){
   $a=5;
   $b=3;
   $c = $a+$b;
   return $c;
});

Route::get('third-route',function(){
   return true;
});

Route::get('route4',function(){
   return response()->json(['first-name'=>"ali","last-name"=>"ibrahim"]);
});

Route::get('route5',function(){
    return response()->json(['first-name'=>"ali","last-name"=>"ibrahim"])
        ->header('myKey',"this is my key value")
        ->header('myKey2',"this is my second key value");
});

Route::get('route6',function(){
    return response()->json(['first-name'=>"ali","last-name"=>"ibrahim"])
        ->withHeaders([
            'myKey1'=>"key 1",
            "myKey2"=> "key 2"
        ]);
});


Route::get('route7/{id}',function($id){
   return "This is the value of the parameter: " .$id;
});

Route::get('route8/{id}/{name}',function($id,$name){
    return "The id is " .$id ." and the name is:" .$name;
});

Route::get('route9/{id?}',function ($id=0){
    return "This is the value of the parameter: " .$id;
});

Route::get('route-ten',function(){
    return response()->json(['first-name'=>"ali","last-name"=>"ibrahim"]);
})->name("my-route");

