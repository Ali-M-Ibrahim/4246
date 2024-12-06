<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait{

    function SuccessResponse($content, $code)
    {
        return response()->json(['content'=>$content, 'code'=>$code]);
    }

    function ErrorResponse($content, $code){
        return response()->json(['error'=>$content, 'code'=>$code]);
    }
}

