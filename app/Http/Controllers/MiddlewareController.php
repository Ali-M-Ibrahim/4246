<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class MiddlewareController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'secretfilter',

        ];
    }

    function index()
    {
        return "hi";
    }
}
