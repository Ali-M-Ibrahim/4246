<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function function1(){
        return "hello i am function 1 from first controller";
    }

    function function2($id){
        return "This is the value of the parameter: " .$id;
    }
}
