<?php

namespace App\Http\Controllers;

use App\Services\LoggerService;
use Illuminate\Http\Request;

class DIController extends Controller
{

    private $logging;
    public function __construct(LoggerService $logger){
        $this->logging=$logger;
    }
    public function f1(){
        $logger = new LoggerService();
        $logger->log("this is my content withoud DI");
    }

    public function f2(LoggerService $logger){
        $logger->log('this is my content with method DI');
        return "donie";
    }

    public function f3(){
        $this->logging->log('this is my content from class DI');
    }
    public function f4(){
        $this->logging->log('this is my content from class DI');
    }
}
