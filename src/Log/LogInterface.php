<?php
namespace App\Log;

interface LogInterface {
    public function info($message);
    public function debug($message);
    public function error($message);
}