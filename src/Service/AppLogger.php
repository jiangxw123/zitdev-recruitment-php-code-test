<?php

namespace App\Service;

class AppLogger
{
    protected $loggers = [
        'log4php'   => "App\\Log\\Log4Php",
        'think-log' => "App\\Log\\ThinkLog"
    ];

    private $ins;

    public function __construct($type = "log4php")
    {

        if(in_array($type, array_keys($this->loggers))) {
            $this->ins = new $this->loggers[$type];
        } else {
            $this->ins = new $this->loggers['log4php'];
        }
    }

    public function __call($method, $arguments) {
        if(!method_exists($this->ins, $method)) {
            throw new \Exception("call to undefined method: {$$method}.");
        }
        call_user_func_array([$this->ins, $method], $arguments);
    }

}