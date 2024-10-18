<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;

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

// we need to import the controller first
Route::get('route11',[FirstController::class,'function1'])->name('route-11');
//we can call it directly
Route::get('route12','App\Http\Controllers\FirstController@function1');
// don't use it
Route::get('route13',[
   'uses'=>'App\Http\Controllers\FirstController@function1',
    'as'=>'name-of-route'
]);

Route::get('route14/{id}',[FirstController::class,'function2']);


Route::resource('product',ResourceController::class);
//if you want to create a resource controller and only use index function
Route::resource('product2',ResourceController::class)->only(['index','create']);
//if you want to create a resource with all functions except one function
Route::resource('product3',ResourceController::class)->except(['create']);
Route::apiResource('api-resource',ApiController::class);
Route::get('invoke',InvokableController::class);

Route::post('route15',[FirstController::class,'function3']);
Route::put('route16',[FirstController::class,'function3']);
Route::patch('route17',[FirstController::class,'function3']);
Route::delete('route18',function(){
    return "hello i am delete";
});
