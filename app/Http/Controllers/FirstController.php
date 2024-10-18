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

    function function3(Request $request){
        // method 1
//        $name= $request->name;
//        $dob=$request->dob;
//        $gender=$request->gender;

        //method 2
        $name= $request->input('name',"joe doe");
        $dob= $request->input('dob',"2024");
        $gender= $request->input('gender',"NA");
        $secretValue =$request->header('secret');
        $ip = $request->ip();

        return "the ip  is:" .$ip;
        return "the secret key is:" .$secretValue;
        return "The data provided are: name:  " .$name . " and dob is: " . $dob . " and gender is: " . $gender;
    }
}
