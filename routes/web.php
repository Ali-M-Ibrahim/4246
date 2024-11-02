<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UniversityController;

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


Route::get('getBooksFromAuthor',[RelationshipController::class,'getBooksFromAuthor']);
Route::get('getAuthorFromBook',[RelationshipController::class,'getAuthorFromBook']);
Route::get('getDetailsFromBook',[RelationshipController::class,'getDetailsFromBook']);
Route::get('getBookFromDetails',[RelationshipController::class,'getBookFromDetails']);
Route::get('getBooksFromReader',[RelationshipController::class,'getBooksFromReader']);
Route::get('getReaderFromBook',[RelationshipController::class,'getReaderFromBook']);


Route::get('getAllReaders',[ReaderController::class,'getAllReaders']);
Route::get('getReaderById/{id}',[ReaderController::class,'getReaderById']);
Route::get('getReaderByIdOrFail/{id}',[ReaderController::class,'getReaderByIdOrFail']);
Route::get('getReaderByIdOr/{id}',[ReaderController::class,'getReaderByIdOr']);
Route::get('getReaderWhereIsEditor',[ReaderController::class,'getReaderWhereIsEditor']);
Route::get('getReaderWhereBalanceGt100',[ReaderController::class,'getReaderWhereBalanceGt100']);
Route::get('getFirstReaderWhereBalanceGt100',[ReaderController::class,'getFirstReaderWhereBalanceGt100']);
Route::get('getFirstReaderWhereBalancelt100OrFail/{nb}',[ReaderController::class,'getFirstReaderWhereBalancelt100OrFail']);
Route::get('getFirstReaderWhereBalancelt100Or/{nb}',[ReaderController::class,'getFirstReaderWhereBalancelt100Or']);

Route::get('getReaderWhereBalanceGt100AndIsEditor',[ReaderController::class,'getReaderWhereBalanceGt100AndIsEditor']);
Route::get('getReaderWhereBalanceGt100OrIsEditor',[ReaderController::class,'getReaderWhereBalanceGt100OrIsEditor']);
Route::get('getReadersWhereIn',[ReaderController::class,'getReadersWhereIn']);
Route::get('getReadersWhereBetween',[ReaderController::class,'getReadersWhereBetween']);
Route::get('getReadersTake2',[ReaderController::class,'getReadersTake2']);
Route::get('getNameAndBalanceReaders',[ReaderController::class,'getNameAndBalanceReaders']);
Route::get('getReadersOrderByBalance',[ReaderController::class,'getReadersOrderByBalance']);
Route::get('getReadersOrderByBalanceDesc',[ReaderController::class,'getReadersOrderByBalanceDesc']);
Route::get('getSumBalanceReader',[ReaderController::class,'getSumBalanceReader']);
Route::get('getCountBalanceReader',[ReaderController::class,'getCountBalanceReader']);
Route::get('getMaxBalanceReader',[ReaderController::class,'getMaxBalanceReader']);
Route::get('getMinBalanceReader',[ReaderController::class,'getMinBalanceReader']);
Route::get('getAvgBalanceReader',[ReaderController::class,'getAvgBalanceReader']);
Route::get('getAuhtorsAndBooks',[ReaderController::class,'getAuhtorsAndBooks']);
Route::get('addReader1',[ReaderController::class,'addReader1']);
Route::post('addReader2',[ReaderController::class,'addReader2']);
Route::get('addReader3',[ReaderController::class,'addReader3']);
Route::post('addReader4',[ReaderController::class,'addReader4']);
Route::post('addReader5',[ReaderController::class,'addReader5']);



Route::get('updateReader1',[ReaderController::class,'updateReader1']);
Route::put('updateReader2/{id}',[ReaderController::class,'updateReader2']);
Route::get('updateReader3',[ReaderController::class,'updateReader3']);
Route::get('deleteReader/{id}',[ReaderController::class,'deleteReader']);
Route::delete('deleteReader/{id}',[ReaderController::class,'deleteReader']);
Route::get('massDelete',[ReaderController::class,'massDelete']);
Route::put('update4/{id}',[ReaderController::class,'update4']);



Route::get('viewPage',[ViewController::class,'index']);
Route::get('viewPage2',[ViewController::class,'index2']);
Route::get('viewPage3',[ViewController::class,'index3']);
Route::get('getViewReader/{id}',[ViewController::class,'getViewReader']);
Route::get('getListReaders',[ViewController::class,'getListReaders']);
Route::get('rendertest',[ViewController::class,'rendertest']);
Route::get('rendertest2',[ViewController::class,'rendertest2']);

Route::apiResource('uni',UniversityController::class);



