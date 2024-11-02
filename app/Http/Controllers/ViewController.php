<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function index(){
        $string= "hello class";
        $date="10/10/2021";
        $data = ['firstname' => "Ali", "lastname"=>"Ibrahim" ];
        $this->prepareData();
        return view('index',['val1'=>$string, 'val2'=>$date, 'val3'=>$data ]);
    }

    function index2(){
        $val1= "hello class";
        $val2="10/10/2021";
        $val3 = ['firstname' => "Ali", "lastname"=>"Ibrahim" ];
        $this->prepareData();
        return view('index',compact('val1','val2','val3'));
    }

    function index3(){
        $string= "hello class";
        $date="10/10/2021";
        $this->prepareData();
        $data = ['firstname' => "Ali", "lastname"=>"Ibrahim" ];
        return view('index')
            ->with('val1',$string)
            ->with('val2',$date)
            ->with('val3',$data);
    }

    function prepareData(){
        $data = "This is a global data";
        \View::share(['val4'=>$data]);
    }

    function getViewReader($id){
        $data = Reader::findOrFail($id);
        return view('viewreader')->with('data',$data);
    }

    function getListReaders(){
        $data = Reader::all();
        return view('lisreader')->with('data',$data);
    }

    function rendertest(){
        return view('test');
    }

    function rendertest2(){
        return view('test2');
    }
}
