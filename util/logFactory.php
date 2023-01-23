<?php

namespace util;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PhpParser\Node\Stmt\Return_;
use Psr\Log\LoggerInterface;

class LogFactory{
    public static function getLogger (string $canal = "miApp"): LoggerInterface{
        $log = new Logger($canal);
        $log->pushHandler(new StreamHandler("log/miApp.log", Logger::DEBUG));

        Return $log;
    }
}