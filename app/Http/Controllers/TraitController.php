<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class TraitController extends Controller
{
    use ResponseTrait;

    function index(){
        $data = "This is my message";
//        return $this->SuccessResponse($data,200);
        return $this->ErrorResponse($data,500);
    }
}
