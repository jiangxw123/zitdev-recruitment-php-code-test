<?php


namespace App\Log;


use think\facade\Log;

class ThinkLog implements LogInterface
{
    private $_logger;
    public function __construct()
    {
        $this->_logger = Log::instance();
        $this->_logger->init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	dirname(__DIR__).'/../logs/think-log/',
                ],
            ],
        ]);
    }

    public function info($message)
    {
        $this->_logger->info(strtoupper($message));
    }

    public function debug($message)
    {
        $this->_logger->debug(strtoupper($message));
    }

    public function error($message)
    {
        $this->_logger->error(strtoupper($message));
    }
}