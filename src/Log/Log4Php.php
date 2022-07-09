<?php


namespace App\Log;


class Log4Php implements LogInterface
{
    private $_logger;
    public function __construct()
    {
        \Logger::configure("log4php.xml");
        $this->_logger = \Logger::getLogger("Log");

    }

    public function info($message = '')
    {
        $this->_logger->info($message);
    }

    public function debug($message = '')
    {
        $this->_logger->debug($message);
    }

    public function error($message = '')
    {
        $this->_logger->error($message);
    }
}